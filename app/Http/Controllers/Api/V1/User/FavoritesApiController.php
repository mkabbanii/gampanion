<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Requests\UpdateFavoriteRequest;
use App\Http\Resources\Admin\FavoriteResource;
use App\Models\Favorite;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class FavoritesApiController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }
    public function index1()
    {
        if (Auth::check())
        {
            if(isset(Auth::guard('api')->user()->id))
            {
                $connectedUserId = Auth::guard('api')->user()->id;
                return new FavoriteResource(Favorite::with(['user', 'favorite_user'])->where('user_id',$connectedUserId)->get());
            }
            else {
                abort_if(Gate::denies('favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
            abort_if(Gate::denies('favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        } 
    }
    public function index2()
    {
        if (Auth::check())
        {
            if(isset(Auth::guard('api')->user()->id))
            {
                $connectedUserId = Auth::guard('api')->user()->id;
                return new FavoriteResource(Favorite::with(['user1', 'favorite_user1'])->where('user_id',$connectedUserId)->get());
            }
            else{
                abort_if(Gate::denies('favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
             abort_if(Gate::denies('favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }  
    }
    public function index3()
    {
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id))
            {
                $connectedUserId = Auth::guard('api')->user()->id;
                return new FavoriteResource(Favorite::with(['user1', 'favorite_user'])->where('user_id',$connectedUserId)->get());
            }
            else{
                abort_if(Gate::denies('favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
             abort_if(Gate::denies('favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        } 
    }  
}
