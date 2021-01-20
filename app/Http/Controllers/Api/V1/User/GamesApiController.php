<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Http\Resources\Admin\GameResource;
use App\Models\Game;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;

class GamesApiController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
       return new GameResource(Game::all());        
    }

    public function AllAndGampanions()
    {
        return new GameResource(Game::with('gameGampanions')->get());
    }
    
    public function show(Game $game)
    {
        return Game::with('gameGampanions')->where('id',$game->id)->get();
    }
}
