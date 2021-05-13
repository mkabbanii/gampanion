<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Requests\UpdateFavoriteRequest;
use App\Http\Resources\Admin\FavoriteResource;
use App\Models\Banner;
use App\Models\Favorite;
use App\Models\Gampanion;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class FavoritesApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function add(Request $request)
    {
        $this->middleware('auth:api');
        if (Auth::check()) {
            if (isset(Auth::guard('api')->user()->id) && (Auth::guard('api')->user())) {
                $connectedUserId = Auth::id();
                Favorite::create([
                    'user_id' => $connectedUserId,
                    'favorite_user_id' => $request->favorite_user_id,
                ]);
                $response = ['message' => 'You have Add The Gampanion to user Favorite'];
                return response($response, 200);
            }
        } else {
            abort_if(Gate::denies('favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function destroy(Request $request)
    {
        $this->middleware('auth:api');
        if (Auth::check()) {
            if (isset(Auth::guard('api')->user()->id) && (Auth::guard('api')->user())) {
                $connectedUserId = Auth::id();
                $favorite = Favorite::where([['user_id', '=', $connectedUserId], ['favorite_user_id', '=', $request->favorite_user_id],])->first();
                if ($favorite != null) {
                    $favorite->forceDelete();
                    $response = ['message' => 'You have Deleted The Gampanion from user Favorite'];
                    return response($response, 200);
                }
                $response = ['message' => 'You have not Deleted The Gampanion from user Favorite'];
                return response($response, 422);
            }
        } else {
            abort_if(Gate::denies('favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function index1()
    {
        if (Auth::check()) {
            if (isset(Auth::guard('api')->user()->id)) {
                $connectedUserId = Auth::id();
                return new FavoriteResource(Favorite::with(['user', 'favorite_user'])->where('user_id', $connectedUserId)->get());
            } else {
                abort_if(Gate::denies('favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        } else {
            abort_if(Gate::denies('favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function index2()
    {
        if (Auth::check()) {
            if (isset(Auth::guard('api')->user()->id)) {
                $connectedUserId = Auth::guard('api')->user()->id;
                $fav = Favorite::where('user_id', $connectedUserId)->select('user_id', 'favorite_user_id')->get();
                foreach ($fav as $user) {
                    $fav_user = User::where('id',$user->favorite_user_id)->select(['rank', 'name'])->first();
                    $url=$fav_user->getPhoto();
                    $fav_user->photo_url = $url;
                    $user->favorite_user = $fav_user->only(['name','rank','photo_url']);
                }
                return new FavoriteResource($fav);
            } else {
                abort_if(Gate::denies('favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        } else {
            abort_if(Gate::denies('favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function index3()
    {
        if (Auth::check()) {
            if (isset(Auth::guard('api')->user()->id)) {
                $connectedUserId = Auth::guard('api')->user()->id;
                return new FavoriteResource(Favorite::with(['user1', 'favorite_user'])->where('user_id', $connectedUserId)->get());
            } else {
                abort_if(Gate::denies('favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        } else {
            abort_if(Gate::denies('favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }


}
