<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Http\Resources\Admin\GameResource;
use App\Models\Game;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GamesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('game_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GameResource(Game::all());
    }

    public function store(StoreGameRequest $request)
    {
        $game = Game::create($request->all());

        if ($request->input('game_photo', false)) {
            $game->addMedia(storage_path('tmp/uploads/' . $request->input('game_photo')))->toMediaCollection('game_photo');
        }

        return (new GameResource($game))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Game $game)
    {
        abort_if(Gate::denies('game_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GameResource($game);
    }

    public function update(UpdateGameRequest $request, Game $game)
    {
        $game->update($request->all());

        if ($request->input('game_photo', false)) {
            if (!$game->game_photo || $request->input('game_photo') !== $game->game_photo->file_name) {
                if ($game->game_photo) {
                    $game->game_photo->delete();
                }

                $game->addMedia(storage_path('tmp/uploads/' . $request->input('game_photo')))->toMediaCollection('game_photo');
            }
        } elseif ($game->game_photo) {
            $game->game_photo->delete();
        }

        return (new GameResource($game))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Game $game)
    {
        abort_if(Gate::denies('game_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $game->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
