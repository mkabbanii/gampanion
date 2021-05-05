@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.coupon.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.coupons.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.coupon.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $coupon->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.coupon.fields.code') }}
                                    </th>
                                    <td>
                                        {{ $coupon->code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.coupon.fields.points') }}
                                    </th>
                                    <td>
                                        {{ $coupon->points }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.coupon.fields.is_valid') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Coupon::IS_VALID_RADIO[$coupon->is_valid] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.coupon.fields.end_date') }}
                                    </th>
                                    <td>
                                        {{ $coupon->end_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.coupon.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $coupon->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.coupon.fields.note') }}
                                    </th>
                                    <td>
                                        {{ $coupon->note }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.coupons.index') }}">
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