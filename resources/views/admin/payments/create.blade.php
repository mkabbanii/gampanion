@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.payment.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.payments.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label class="required" for="user_id">{{ trans('cruds.payment.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('transaction_amount') ? 'has-error' : '' }}">
                            <label for="transaction_amount">{{ trans('cruds.payment.fields.transaction_amount') }}</label>
                            <input class="form-control" type="number" name="transaction_amount" id="transaction_amount" value="{{ old('transaction_amount', '0') }}" step="1">
                            @if($errors->has('transaction_amount'))
                                <span class="help-block" role="alert">{{ $errors->first('transaction_amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.transaction_amount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('earned_points') ? 'has-error' : '' }}">
                            <label for="earned_points">{{ trans('cruds.payment.fields.earned_points') }}</label>
                            <input class="form-control" type="number" name="earned_points" id="earned_points" value="{{ old('earned_points', '0') }}" step="1">
                            @if($errors->has('earned_points'))
                                <span class="help-block" role="alert">{{ $errors->first('earned_points') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.earned_points_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label class="required" for="status_id">{{ trans('cruds.payment.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id" required>
                                @foreach($statuses as $id => $status)
                                    <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('payment_method') ? 'has-error' : '' }}">
                            <label for="payment_method_id">{{ trans('cruds.payment.fields.payment_method') }}</label>
                            <select class="form-control select2" name="payment_method_id" id="payment_method_id">
                                @foreach($payment_methods as $id => $payment_method)
                                    <option value="{{ $id }}" {{ old('payment_method_id') == $id ? 'selected' : '' }}>{{ $payment_method }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('payment_method'))
                                <span class="help-block" role="alert">{{ $errors->first('payment_method') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.payment_method_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                            <label for="note">{{ trans('cruds.payment.fields.note') }}</label>
                            <input class="form-control" type="text" name="note" id="note" value="{{ old('note', '') }}">
                            @if($errors->has('note'))
                                <span class="help-block" role="alert">{{ $errors->first('note') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.note_helper') }}</span>
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