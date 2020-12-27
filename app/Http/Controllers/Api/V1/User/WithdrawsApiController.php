<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreWithdrawRequest;
use App\Http\Requests\UpdateWithdrawRequest;
use App\Http\Resources\Admin\WithdrawResource;
use App\Models\Withdraw;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use App\Models\Wallet;
use App\Http\Resources\Admin\WalletResource;

class WithdrawsApiController extends Controller
{
    use MediaUploadingTrait;

    public function __construct(){
        $this->middleware('auth:api');
    }
    public function index()
    {
        if (Auth::check())
        {
            if(isset(Auth::guard('api')->user()->id))
            {
                return new WithdrawResource(Withdraw::with(['user', 'payment_method', 'status'])->get());
            }
            else{
                abort_if(Gate::denies('withdraw_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }else{
            abort_if(Gate::denies('withdraw_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function store(StoreWithdrawRequest $request)
    {
        if (Auth::check())
        {
            if(isset(Auth::guard('api')->user()->id) && (Auth::guard('api')->user()->is_provider=="Yes"))
            {
                $withdraw = Withdraw::create($request->all());
                $connectedUserId = Auth::guard('api')->user()->id;
                $wallet = Wallet::select('balance')->where('user_id',$connectedUserId)->get()->toArray();
                if($wallet[0]["balance"]>=$request->input('points')){
                    if ($request->input('payment_copy', false)) {
                        $withdraw->addMedia(storage_path('tmp/uploads/' . $request->input('payment_copy')))->toMediaCollection('payment_copy');
                    }
                    return (new WithdrawResource($withdraw))
                        ->response()
                        ->setStatusCode(Response::HTTP_CREATED);
                }else{
                    return response()->json(['errors' => 'Not enough balance'], 402);
                }
            }else{
                return response()->json(['errors' => 'Current user is not a provider'], 401);
            }
        }else{
            abort_if(Gate::denies('withdraw_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }   
}
