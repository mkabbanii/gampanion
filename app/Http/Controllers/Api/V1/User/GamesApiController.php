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

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id))
            {
                return new GameResource(Game::all());
            }else{
                abort_if(Gate::denies('game_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
            abort_if(Gate::denies('game_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }        
    }

    public function AllAndGampanions()
    {
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id))
            {
                return new GameResource(Game::with('gameGampanions')->get());
            }
            else{
                abort_if(Gate::denies('game_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
            abort_if(Gate::denies('game_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }
    
    public function show(Game $game)
    {
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id))
            {
                return Game::with('gameGampanions')->where('id',$game->id)->get();
            }
            else{
                abort_if(Gate::denies('game_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
            abort_if(Gate::denies('game_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }
}
