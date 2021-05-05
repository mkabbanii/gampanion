<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Http\Resources\Admin\WalletResource;
use App\Models\Wallet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class WalletsApiController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }
    public function show()
    {
        if (Auth::check())
        {
            if(isset(Auth::guard('api')->user()->id))
            {
                $connectedUserId = Auth::guard('api')->user()->id;
                return new WalletResource(Wallet::with(['user'])->where('user_id',$connectedUserId)->get());
            }
            else {
                abort_if(Gate::denies('wallet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
            abort_if(Gate::denies('wallet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        } 
    }

    
}
