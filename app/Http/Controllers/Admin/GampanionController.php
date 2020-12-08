<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyGampanionRequest;
use App\Http\Requests\StoreGampanionRequest;
use App\Http\Requests\UpdateGampanionRequest;
use App\Models\Game;
use App\Models\Gampanion;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class GampanionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('gampanion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gampanions = Gampanion::with(['game', 'user', 'media'])->get();

        return view('admin.gampanions.index', compact('gampanions'));
    }

    public function create()
    {
        abort_if(Gate::denies('gampanion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $games = Game::all()->pluck('game_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.gampanions.create', compact('games', 'users'));
    }

    public function store(StoreGampanionRequest $request)
    {
        $gampanion = Gampanion::create($request->all());

        if ($request->input('photo', false)) {
            $gampanion->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $gampanion->id]);
        }

        return redirect()->route('admin.gampanions.index');
    }

    public function edit(Gampanion $gampanion)
    {
        abort_if(Gate::denies('gampanion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $games = Game::all()->pluck('game_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gampanion->load('game', 'user');

        return view('admin.gampanions.edit', compact('games', 'users', 'gampanion'));
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

        return redirect()->route('admin.gampanions.index');
    }

    public function show(Gampanion $gampanion)
    {
        abort_if(Gate::denies('gampanion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gampanion->load('game', 'user', 'gampanionReviews', 'gampanionOrders');

        return view('admin.gampanions.show', compact('gampanion'));
    }

    public function destroy(Gampanion $gampanion)
    {
        abort_if(Gate::denies('gampanion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gampanion->delete();

        return back();
    }

    public function massDestroy(MassDestroyGampanionRequest $request)
    {
        Gampanion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('gampanion_create') && Gate::denies('gampanion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Gampanion();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
