<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyWithdrawRequest;
use App\Http\Requests\StoreWithdrawRequest;
use App\Http\Requests\UpdateWithdrawRequest;
use App\Models\PaymentMethod;
use App\Models\Status;
use App\Models\User;
use App\Models\Withdraw;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class WithdrawsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('withdraw_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $withdraws = Withdraw::all();

        return view('admin.withdraws.index', compact('withdraws'));
    }

    public function create()
    {
        abort_if(Gate::denies('withdraw_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_methods = PaymentMethod::all()->pluck('method', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.withdraws.create', compact('users', 'payment_methods', 'statuses'));
    }

    public function store(StoreWithdrawRequest $request)
    {
        $withdraw = Withdraw::create($request->all());

        if ($request->input('payment_copy', false)) {
            $withdraw->addMedia(storage_path('tmp/uploads/' . $request->input('payment_copy')))->toMediaCollection('payment_copy');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $withdraw->id]);
        }

        return redirect()->route('admin.withdraws.index');
    }

    public function edit(Withdraw $withdraw)
    {
        abort_if(Gate::denies('withdraw_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_methods = PaymentMethod::all()->pluck('method', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $withdraw->load('user', 'payment_method', 'status');

        return view('admin.withdraws.edit', compact('users', 'payment_methods', 'statuses', 'withdraw'));
    }

    public function update(UpdateWithdrawRequest $request, Withdraw $withdraw)
    {
        $withdraw->update($request->all());

        if ($request->input('payment_copy', false)) {
            if (!$withdraw->payment_copy || $request->input('payment_copy') !== $withdraw->payment_copy->file_name) {
                if ($withdraw->payment_copy) {
                    $withdraw->payment_copy->delete();
                }

                $withdraw->addMedia(storage_path('tmp/uploads/' . $request->input('payment_copy')))->toMediaCollection('payment_copy');
            }
        } elseif ($withdraw->payment_copy) {
            $withdraw->payment_copy->delete();
        }

        return redirect()->route('admin.withdraws.index');
    }

    public function show(Withdraw $withdraw)
    {
        abort_if(Gate::denies('withdraw_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $withdraw->load('user', 'payment_method', 'status');

        return view('admin.withdraws.show', compact('withdraw'));
    }

    public function destroy(Withdraw $withdraw)
    {
        abort_if(Gate::denies('withdraw_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $withdraw->delete();

        return back();
    }

    public function massDestroy(MassDestroyWithdrawRequest $request)
    {
        Withdraw::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('withdraw_create') && Gate::denies('withdraw_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Withdraw();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
