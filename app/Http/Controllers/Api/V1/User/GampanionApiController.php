<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreGampanionRequest;
use App\Http\Requests\UpdateGampanionRequest;
use App\Http\Resources\Admin\GampanionResource;
use App\Models\Favorite;
use App\Models\Gampanion;
use App\Models\GampanionRequests;
use Gate;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GampanionApiController extends Controller
{
    use MediaUploadingTrait;

    public function __construct()
    {

    }

    public function index()
    {
        $connectedUserId = Auth::guard('api')->user()->id;
        $gampanions = Gampanion::with(['game', 'user'])->get();
        foreach ($gampanions as $gampanion) {
            $favs = Favorite::select('favorite_user_id')->where('user_id', $connectedUserId)->get();
            $favs_ids = array();
            foreach ($favs as $fav) {
                $favs_ids[] = $fav->favorite_user_id;
            }
            if (in_array($gampanion->user_id, $favs_ids))
                $gampanion->fav = true;
            else $gampanion->fav = false;
        }
        return new GampanionResource($gampanions);
    }

    public function show(Gampanion $gampanion)
    {
        return new GampanionResource($gampanion->load(['game', 'user', 'gampanionReviews']));
    }

    public function add(Request $request)
    {
        $this->middleware('auth:api');
        if (Auth::check()) {
            if (isset(Auth::guard('api')->user()->id) && (Auth::guard('api')->user()->is_provider != "Yes")) {
                $requJson = json_decode(json_encode($request->json()->all()));
                $games = $request->games;
                $gampanion1 = $request->gampanion;
                $gampanion = $requJson->gampanion;
                for ($i = 0; $i < count($games); $i++) {
                    $gampanion1['game_id'] = $games[$i]['game_id'];
                    $gampanion->game_id = $games[$i]['game_id'];
                    $gampanion = Gampanion::create($gampanion1);
                    if ($games[$i]['photo'] != null) {
                        $gampanion->addMedia(storage_path('tmp/uploads/' . $games[$i]['photo']))->toMediaCollection('photo');
                    }
                    $gampanion->photo = $games[$i]['photo'];
                    new GampanionResource($gampanion);
                }
                return response()->json(['success' => 'success', "statusCode" => Response::HTTP_CREATED]);
            } else {
                return response()->json(['errors' => 'Current user is not a simple user'], 401);
            }
        } else {
            abort_if(Gate::denies('gampanion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function Request()
    {
        if (Auth::guard('api')->user()->id) {
            var_dump(Auth::guard('api')->user()->getIsAdminAttribute());
            $connected_userid = Auth::guard('api')->user()->id;
            $is_provider=Auth::guard('api')->user()->isProvider();
            if ((isset(Auth::guard('api')->user()->id) && (Auth::guard('api')->user()->is_provider != "Yes")) && !$is_provider) {
                $requestDb = GampanionRequests::where('user_id',$connected_userid)->first();
                if(!$requestDb) {

                    $newRequest = new GampanionRequests();
                    $newRequest->user_id = $connected_userid;
                    $newRequest->save();
                    return Response()->json(['message'=>'Request Sent']);
                }else{
                    if($requestDb->status == 1) return Response()->json(['message'=>'Request is pending please wait']);
                    if($requestDb->status == 2) return Response()->json(['message'=>'You are already a Gampanion']);
                }
            } else {
                return response()->json(['errors' => 'Current user is not a simple user'], 401);
            }
        } else {
            abort_if(Gate::denies('gampanion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }
    public function SendRequest()
    {
        if (Auth::guard('api')->user()->id) {
            $connected_userid = Auth::guard('api')->user()->id;
            $is_provider=Auth::guard('api')->user()->isProvider();
            if ((isset(Auth::guard('api')->user()->id) && (Auth::guard('api')->user()->is_provider != "Yes")) && !$is_provider) {
                $requestDb = GampanionRequests::where('user_id',$connected_userid)->first();
                if(!$requestDb) {

                    $newRequest = new GampanionRequests();
                    $newRequest->user_id = $connected_userid;
                    $newRequest->save();
                    return Response()->json(['message'=>'Request Sent']);
                }else{
                    if($requestDb->status == 1) return Response()->json(['message'=>'Request is pending please wait']);
                    if($requestDb->status == 2) return Response()->json(['message'=>'You are already a Gampanion']);
                }
            } else {
                return response()->json(['errors' => 'Current user is not a simple user'], 401);
            }
        } else {
            abort_if(Gate::denies('gampanion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function addGame(Request $request)
    {
        $this->middleware('auth:api');
        if (isset(Auth::guard('api')->user()->id)) {
            if (isset(Auth::guard('api')->user()->id) && (Auth::guard('api')->user()->is_provider != "Yes")) {
                $connectedUserId = Auth::guard('api')->user()->id;
                $requJson = json_decode(json_encode($request->json()->all()));
                $game = $request->games;
                $gampanion1 = $request->gampanion;
                $gampanion = $requJson->gampanion;
                $gampanion1['game_id'] = $game['game_id'];
                $gampanion1['user_id'] = $connectedUserId;
                $gampanion->game_id = $game['game_id'];
                $gampanion->user_id = $connectedUserId;
                $gampanion = Gampanion::create($gampanion1);
                if ($game['photo'] != null) {
                    $gampanion->addMedia(storage_path('tmp/uploads/' . $game['photo']))->toMediaCollection('photo');
                }
                $gampanion->photo = $game['photo'];
                new GampanionResource($gampanion);

                return response()->json(['success' => 'success', "statusCode" => Response::HTTP_CREATED]);
            } else {
                return response()->json(['errors' => 'Current user is not a simple user'], 401);
            }
        } else {
            abort_if(Gate::denies('gampanion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function delete($id)
    {
        $this->middleware('auth:api');

        if (true) {
            var_dump("22");
            if (isset(Auth::guard('api')->user()->id) && (Auth::guard('api')->user()->is_provider != "Yes")) {

                $Gampanion = Gampanion::find($id);
                $Gampanion->delete();
                return response(null, Response::HTTP_NO_CONTENT);
            } else {
                return response()->json(['errors' => 'Current user is not a simple user'], 401);
            }
        } else {
            abort_if(Gate::denies('gampanion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function featuredGampanions()
    {
        return new GampanionResource(Gampanion::with(['game', 'user'])->whereHas("game", function ($q) {
            $q->where("is_featured", "=", 1);
        })->get());
    }
}
