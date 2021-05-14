<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Requests\UpdateWalletRequest;
use App\Http\Resources\Admin\WalletResource;
use App\Models\User;
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
                $wallet = Wallet::where('user_id',$connectedUserId)->first();

                $user = User::find($connectedUserId);
                $url=$user->getPhoto();
                $user->photo_url = $url;

                $wallet->user = $user->only(['name','created_at','photo_url']);
                return new WalletResource($wallet->only(['user','balance','last_added_amount','previous_balance','last_deduct_amount']));
            }
            else {
                abort_if(Gate::denies('wallet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
            abort_if(Gate::denies('wallet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }


}
