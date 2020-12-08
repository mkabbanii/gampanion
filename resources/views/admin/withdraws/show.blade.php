@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.withdraw.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.withdraws.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $withdraw->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $withdraw->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.points') }}
                                    </th>
                                    <td>
                                        {{ $withdraw->points }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.cash_amount') }}
                                    </th>
                                    <td>
                                        {{ $withdraw->cash_amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.payment_method') }}
                                    </th>
                                    <td>
                                        {{ $withdraw->payment_method->method ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.payment_copy') }}
                                    </th>
                                    <td>
                                        @if($withdraw->payment_copy)
                                            <a href="{{ $withdraw->payment_copy->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.note') }}
                                    </th>
                                    <td>
                                        {{ $withdraw->note }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $withdraw->status->status ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.withdraws.index') }}">
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