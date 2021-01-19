<?php

namespace App\Http\Controllers\Api\V1\uSER;

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

    public function __construct()
    {
      //  $this->middleware('auth:api');
    }

    public function index()
    {
    //    if (Auth::check())
    //    {
          //  if( isset(Auth::guard('api')->user()->id))
        //    {
                return new GampanionResource(Gampanion::with(['game','user'])->get());
          //  }
          //  else{
           //     abort_if(Gate::denies('gampanion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
     //       }
     //   }else{
       //     abort_if(Gate::denies('gampanion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
     //   }
    }

    public function show(Gampanion $gampanion)
    {
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id))
            {
                return new GampanionResource($gampanion->load(['game', 'user','gampanionReviews']));
            }
            else{
                abort_if(Gate::denies('gampanion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
            abort_if(Gate::denies('gampanion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function add(Request $request)
    {
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id) && (Auth::guard('api')->user()->is_provider!="Yes"))
            {
                $requJson = json_decode(json_encode($request->json()->all()));
                $games = $request->games;
                $gampanion1=$request->gampanion;
                $gampanion = $requJson->gampanion;
                for ($i=0; $i < count($games); $i++) {
                    $gampanion1['game_id'] = $games[$i]['game_id'];
                    $gampanion->game_id = $games[$i]['game_id'];
                    $gampanion = Gampanion::create($gampanion1);
                    if ($games[$i]['photo']!=null) {
                        $gampanion->addMedia(storage_path('tmp/uploads/' . $games[$i]['photo']))->toMediaCollection('photo');
                    }
                    $gampanion->photo=$games[$i]['photo'];
                    new GampanionResource($gampanion);
                }
                return response()->json(['success' => 'success', "statusCode"=>Response::HTTP_CREATED]); 
            }
            else{
                return response()->json(['errors' => 'Current user is not a simple user'], 401);
            }
        }else{
            abort_if(Gate::denies('gampanion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function featuredGampanions(){
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id))
            {
                    return new GampanionResource(Gampanion::with(['game','user'])->whereHas("game", function($q) {
                        $q->where("is_featured","=",1);
                    })->get());
            }
            else{
                abort_if(Gate::denies('gampanion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
            abort_if(Gate::denies('gampanion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }
}