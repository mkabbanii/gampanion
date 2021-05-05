@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.redemption.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.redemptions.update", [$redemption->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('coupon') ? 'has-error' : '' }}">
                            <label class="required" for="coupon_id">{{ trans('cruds.redemption.fields.coupon') }}</label>
                            <select class="form-control select2" name="coupon_id" id="coupon_id" required>
                                @foreach($coupons as $id => $coupon)
                                    <option value="{{ $id }}" {{ (old('coupon_id') ? old('coupon_id') : $redemption->coupon->id ?? '') == $id ? 'selected' : '' }}>{{ $coupon }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('coupon'))
                                <span class="help-block" role="alert">{{ $errors->first('coupon') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.redemption.fields.coupon_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label class="required" for="user_id">{{ trans('cruds.redemption.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $redemption->user->id ?? '') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.redemption.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection