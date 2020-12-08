<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRedemptionRequest;
use App\Http\Requests\UpdateRedemptionRequest;
use App\Http\Resources\Admin\RedemptionResource;
use App\Models\Redemption;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedemptionsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('redemption_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RedemptionResource(Redemption::with(['coupon', 'user'])->get());
    }

    public function store(StoreRedemptionRequest $request)
    {
        $redemption = Redemption::create($request->all());

        return (new RedemptionResource($redemption))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Redemption $redemption)
    {
        abort_if(Gate::denies('redemption_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RedemptionResource($redemption->load(['coupon', 'user']));
    }

    public function update(UpdateRedemptionRequest $request, Redemption $redemption)
    {
        $redemption->update($request->all());

        return (new RedemptionResource($redemption))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Redemption $redemption)
    {
        abort_if(Gate::denies('redemption_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $redemption->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
