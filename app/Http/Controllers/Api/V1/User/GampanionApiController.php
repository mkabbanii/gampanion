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

    public function index()
    {
        //abort_if(Gate::denies('gampanion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // TODO Auth user
        return new GampanionResource(Gampanion::with(['game','user'])->get());
    }
    

    public function show(Gampanion $gampanion)
    {
        
        //abort_if(Gate::denies('gampanion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // TODO Auth user
        return new GampanionResource($gampanion->load(['game', 'user','gampanionReviews']));
    }

    public function add(Request $request)
    {
        //abort_if(Gate::denies('gampanion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // TODO Auth user
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

    public function featuredGampanions(){
        //abort_if(Gate::denies('gampanion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // TODO Auth user
        return new GampanionResource(Gampanion::with(['game','user'])->whereHas("game", function($q) {
            $q->where("is_featured","=",1);
        })->get());
    }

    
}
