<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Http\Resources\Admin\GameResource;
use App\Models\Game;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
//use App\User;

class GamesApiController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        $games = Game::all();
        foreach ($games as $game) {
            $gampanion_data = array();
            $gampanions = $game->gameGampanions()->get();
            $game->add_by = $gampanions->count();

            foreach ($gampanions as $gampanion) {
                $gampanion_data[] =User::find($gampanion->user_id);
            }
            $game->gampanion_data = $gampanion_data;
        }
        return new GameResource($games);
    }

    public function AllAndGampanions()
    {
        return new GameResource(Game::with('gameGampanions')->get());
    }

    public function show(Game $game)
    {
        return Game::with('gameGampanions')->where('id', $game->id)->get();
    }
}
