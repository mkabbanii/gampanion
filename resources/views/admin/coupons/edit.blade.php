@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.coupon.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.coupons.update", [$coupon->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                            <label class="required" for="code">{{ trans('cruds.coupon.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', $coupon->code) }}" required>
                            @if($errors->has('code'))
                                <span class="help-block" role="alert">{{ $errors->first('code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('points') ? 'has-error' : '' }}">
                            <label class="required" for="points">{{ trans('cruds.coupon.fields.points') }}</label>
                            <input class="form-control" type="number" name="points" id="points" value="{{ old('points', $coupon->points) }}" step="1" required>
                            @if($errors->has('points'))
                                <span class="help-block" role="alert">{{ $errors->first('points') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.points_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_valid') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.coupon.fields.is_valid') }}</label>
                            @foreach(App\Models\Coupon::IS_VALID_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_valid_{{ $key }}" name="is_valid" value="{{ $key }}" {{ old('is_valid', $coupon->is_valid) === (string) $key ? 'checked' : '' }}>
                                    <label for="is_valid_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_valid'))
                                <span class="help-block" role="alert">{{ $errors->first('is_valid') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.is_valid_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
                            <label class="required" for="end_date">{{ trans('cruds.coupon.fields.end_date') }}</label>
                            <input class="form-control datetime" type="text" name="end_date" id="end_date" value="{{ old('end_date', $coupon->end_date) }}" required>
                            @if($errors->has('end_date'))
                                <span class="help-block" role="alert">{{ $errors->first('end_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.end_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            <label class="required" for="quantity">{{ trans('cruds.coupon.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', $coupon->quantity) }}" step="1" required>
                            @if($errors->has('quantity'))
                                <span class="help-block" role="alert">{{ $errors->first('quantity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                            <label for="note">{{ trans('cruds.coupon.fields.note') }}</label>
                            <input class="form-control" type="text" name="note" id="note" value="{{ old('note', $coupon->note) }}">
                            @if($errors->has('note'))
                                <span class="help-block" role="alert">{{ $errors->first('note') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.coupon.fields.note_helper') }}</span>
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