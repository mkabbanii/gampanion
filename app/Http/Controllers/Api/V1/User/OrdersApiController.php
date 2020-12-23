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
    public function ordersUser1()
    {
        // TODO Auth user
        /*if (Auth::check())
        {*/
            if( isset(Auth::guard('api')->user()->id))
            {
                $connectedUserId = Auth::guard('api')->user()->id;
            }
            else{
                $connectedUserId = 1;
            }
            return new OrderResource(Order::with(['gampanion'])->where('user_id',$connectedUserId)->exclude(['amount_earned_by_provider'])->get());
        /*}else{
             abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }*/
    }
    public function ordersUser2()
    {
        // TODO Auth user
        /*if (Auth::check())
        {*/
            if( isset(Auth::guard('api')->user()->id))
            {
                $connectedUserId = Auth::guard('api')->user()->id;
            }
            else{
                $connectedUserId = 1;
            }
            return new OrderResource(Order::with(['gampanion'])->where('user_id',$connectedUserId)->exclude(['amount_deducted_from_user'])->get());
        /*}else{
             abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }*/
    }

    public function show1($id)
    {
        // TODO Auth user
        /*if (Auth::check())
        {*/
            if( isset(Auth::guard('api')->user()->id))
            {
                $connectedUserId = Auth::guard('api')->user()->id;
            }
            else{
                $connectedUserId = 1;
            }
            return new OrderResource(Order::with(['gampanion'])->where('id',$id)->where('user_id',$connectedUserId)->exclude(['amount_earned_by_provider'])->get());
        /*}else{
             abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }*/
    }

    public function show2($id)
    {
        // TODO Auth user
        /*if (Auth::check())
        {*/
            if( isset(Auth::guard('api')->user()->id))
            {
                $connectedUserId = Auth::guard('api')->user()->id;
            }
            else{
                $connectedUserId = 1;
            }
            return new OrderResource(Order::with(['gampanion'])->where('id',$id)->where('user_id',$connectedUserId)->exclude(['amount_deducted_from_user'])->get());
        /*}else{
             abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }*/
    }

}
