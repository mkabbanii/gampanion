@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.status.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.statuses.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.status.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $status->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.status.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $status->status }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.statuses.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#status_orders" aria-controls="status_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.order.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#status_payments" aria-controls="status_payments" role="tab" data-toggle="tab">
                            {{ trans('cruds.payment.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="status_orders">
                        @includeIf('admin.statuses.relationships.statusOrders', ['orders' => $status->statusOrders])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="status_payments">
                        @includeIf('admin.statuses.relationships.statusPayments', ['payments' => $status->statusPayments])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection