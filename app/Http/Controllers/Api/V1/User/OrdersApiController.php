<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\Admin\OrderResource;
use App\Models\Order;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class OrdersApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function ordersUser1()
    {
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id) && (Auth::guard('api')->user()->is_provider!="Yes") )
            {
                $connectedUserId = Auth::guard('api')->user()->id;
                return new OrderResource(Order::with(['gampanion'])->where('user_id',$connectedUserId)->exclude(['amount_earned_by_provider'])->get());
            }
            else{
                return response()->json(['errors' => ['Permissions' => ['Current user is not a simple user']]], 401);
            }
            return new OrderResource(Order::with(['gampanion'])->where('user_id',$connectedUserId)->exclude(['amount_earned_by_provider'])->get());
        }else{
             abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }
    public function ordersUser2()
    {
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id) && (Auth::guard('api')->user()->is_provider=="Yes") )
            {
                $connectedUserId = Auth::guard('api')->user()->id;
                return new OrderResource(Order::with(['gampanion'])->where('user_id',$connectedUserId)->exclude(['amount_deducted_from_user'])->get());
            }
            else{
               return  response()->json(['errors' => 'Current user is not a provider'], 401);
            }
        }else{
            abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        
    }

    public function show1($id)
    {
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id) && (Auth::guard('api')->user()->is_provider!="Yes") )
            {
                $connectedUserId = Auth::guard('api')->user()->id;
                return new OrderResource(Order::with(['gampanion'])->where('id',$id)->where('user_id',$connectedUserId)->exclude(['amount_earned_by_provider'])->get());
            }
            else{
                return response()->json(['errors' => ['Permissions' => ['Current user is not a simple user']]], 401);
            }
        }else{
             abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    public function show2($id)
    {
        if (Auth::check())
        {
            if( isset(Auth::guard('api')->user()->id) && (Auth::guard('api')->user()->is_provider=="Yes") )
            {
                $connectedUserId = Auth::guard('api')->user()->id;
                return new OrderResource(Order::with(['gampanion'])->where('id',$id)->where('user_id',$connectedUserId)->exclude(['amount_deducted_from_user'])->get());
            }
            else{
                return response()->json(['errors' => ['Permissions' => ['Current user is not a provider']]], 401);
            }
        }else{
             abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }
}
