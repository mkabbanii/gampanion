<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSystemStringRequest;
use App\Http\Requests\UpdateSystemStringRequest;
use App\Http\Resources\Admin\SystemStringResource;
use App\Models\SystemString;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SystemStringsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('system_string_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SystemStringResource(SystemString::all());
    }

    public function store(StoreSystemStringRequest $request)
    {
        $systemString = SystemString::create($request->all());

        return (new SystemStringResource($systemString))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SystemString $systemString)
    {
        abort_if(Gate::denies('system_string_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SystemStringResource($systemString);
    }

    public function update(UpdateSystemStringRequest $request, SystemString $systemString)
    {
        $systemString->update($request->all());

        return (new SystemStringResource($systemString))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SystemString $systemString)
    {
        abort_if(Gate::denies('system_string_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $systemString->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
