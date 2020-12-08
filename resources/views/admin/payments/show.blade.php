@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.payment.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.payments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $payment->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $payment->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.transaction_amount') }}
                                    </th>
                                    <td>
                                        {{ $payment->transaction_amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.earned_points') }}
                                    </th>
                                    <td>
                                        {{ $payment->earned_points }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $payment->status->status ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.payment_method') }}
                                    </th>
                                    <td>
                                        {{ $payment->payment_method->method ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.note') }}
                                    </th>
                                    <td>
                                        {{ $payment->note }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.payments.index') }}">
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