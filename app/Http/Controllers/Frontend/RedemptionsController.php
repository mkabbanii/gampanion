<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRedemptionRequest;
use App\Http\Requests\StoreRedemptionRequest;
use App\Http\Requests\UpdateRedemptionRequest;
use App\Models\Coupon;
use App\Models\Redemption;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedemptionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('redemption_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $redemptions = Redemption::all();

        return view('frontend.redemptions.index', compact('redemptions'));
    }

    public function create()
    {
        abort_if(Gate::denies('redemption_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coupons = Coupon::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.redemptions.create', compact('coupons', 'users'));
    }

    public function store(StoreRedemptionRequest $request)
    {
        $redemption = Redemption::create($request->all());

        return redirect()->route('frontend.redemptions.index');
    }

    public function edit(Redemption $redemption)
    {
        abort_if(Gate::denies('redemption_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $coupons = Coupon::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $redemption->load('coupon', 'user');

        return view('frontend.redemptions.edit', compact('coupons', 'users', 'redemption'));
    }

    public function update(UpdateRedemptionRequest $request, Redemption $redemption)
    {
        $redemption->update($request->all());

        return redirect()->route('frontend.redemptions.index');
    }

    public function show(Redemption $redemption)
    {
        abort_if(Gate::denies('redemption_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $redemption->load('coupon', 'user');

        return view('frontend.redemptions.show', compact('redemption'));
    }

    public function destroy(Redemption $redemption)
    {
        abort_if(Gate::denies('redemption_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $redemption->delete();

        return back();
    }

    public function massDestroy(MassDestroyRedemptionRequest $request)
    {
        Redemption::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
