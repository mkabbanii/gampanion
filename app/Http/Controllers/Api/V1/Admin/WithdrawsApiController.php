<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreWithdrawRequest;
use App\Http\Requests\UpdateWithdrawRequest;
use App\Http\Resources\Admin\WithdrawResource;
use App\Models\Withdraw;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WithdrawsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('withdraw_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WithdrawResource(Withdraw::with(['user', 'payment_method', 'status'])->get());
    }

    public function store(StoreWithdrawRequest $request)
    {
        $withdraw = Withdraw::create($request->all());

        if ($request->input('payment_copy', false)) {
            $withdraw->addMedia(storage_path('tmp/uploads/' . $request->input('payment_copy')))->toMediaCollection('payment_copy');
        }

        return (new WithdrawResource($withdraw))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Withdraw $withdraw)
    {
        abort_if(Gate::denies('withdraw_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WithdrawResource($withdraw->load(['user', 'payment_method', 'status']));
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

        return (new WithdrawResource($withdraw))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Withdraw $withdraw)
    {
        abort_if(Gate::denies('withdraw_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $withdraw->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
