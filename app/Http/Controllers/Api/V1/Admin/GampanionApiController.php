<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreGampanionRequest;
use App\Http\Requests\UpdateGampanionRequest;
use App\Http\Resources\Admin\GampanionResource;
use App\Models\Gampanion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GampanionApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('gampanion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GampanionResource(Gampanion::with(['game', 'user'])->get());
    }

    public function store(StoreGampanionRequest $request)
    {
        $gampanion = Gampanion::create($request->all());

        if ($request->input('photo', false)) {
            $gampanion->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new GampanionResource($gampanion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Gampanion $gampanion)
    {
        abort_if(Gate::denies('gampanion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GampanionResource($gampanion->load(['game', 'user']));
    }

    public function update(UpdateGampanionRequest $request, Gampanion $gampanion)
    {
        $gampanion->update($request->all());

        if ($request->input('photo', false)) {
            if (!$gampanion->photo || $request->input('photo') !== $gampanion->photo->file_name) {
                if ($gampanion->photo) {
                    $gampanion->photo->delete();
                }

                $gampanion->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($gampanion->photo) {
            $gampanion->photo->delete();
        }

        return (new GampanionResource($gampanion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Gampanion $gampanion)
    {
        abort_if(Gate::denies('gampanion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gampanion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
