@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.withdraw.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.withdraws.index') }}">
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
                            <a class="btn btn-default" href="{{ route('frontend.withdraws.index') }}">
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