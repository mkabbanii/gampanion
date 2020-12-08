@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.order.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.orders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $order->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.game') }}
                                    </th>
                                    <td>
                                        {{ $order->game->game_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $order->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $order->status->status ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.amount_deducted_from_user') }}
                                    </th>
                                    <td>
                                        {{ $order->amount_deducted_from_user }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.amount_earned_by_provider') }}
                                    </th>
                                    <td>
                                        {{ $order->amount_earned_by_provider }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.note') }}
                                    </th>
                                    <td>
                                        {{ $order->note }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.gampanion') }}
                                    </th>
                                    <td>
                                        {{ $order->gampanion->level ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $order->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.approved_at') }}
                                    </th>
                                    <td>
                                        {{ $order->approved_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.rejected_at') }}
                                    </th>
                                    <td>
                                        {{ $order->rejected_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.proposed_time') }}
                                    </th>
                                    <td>
                                        {{ $order->proposed_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.request_note') }}
                                    </th>
                                    <td>
                                        {{ $order->request_note }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.orders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection