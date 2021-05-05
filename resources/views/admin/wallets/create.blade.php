@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.wallet.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.wallets.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label class="required" for="user_id">{{ trans('cruds.wallet.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.wallet.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('balance') ? 'has-error' : '' }}">
                            <label class="required" for="balance">{{ trans('cruds.wallet.fields.balance') }}</label>
                            <input class="form-control" type="number" name="balance" id="balance" value="{{ old('balance', '0') }}" step="1" required>
                            @if($errors->has('balance'))
                                <span class="help-block" role="alert">{{ $errors->first('balance') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.wallet.fields.balance_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('previous_balance') ? 'has-error' : '' }}">
                            <label for="previous_balance">{{ trans('cruds.wallet.fields.previous_balance') }}</label>
                            <input class="form-control" type="number" name="previous_balance" id="previous_balance" value="{{ old('previous_balance', '') }}" step="1">
                            @if($errors->has('previous_balance'))
                                <span class="help-block" role="alert">{{ $errors->first('previous_balance') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.wallet.fields.previous_balance_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('last_added_amount') ? 'has-error' : '' }}">
                            <label for="last_added_amount">{{ trans('cruds.wallet.fields.last_added_amount') }}</label>
                            <input class="form-control" type="number" name="last_added_amount" id="last_added_amount" value="{{ old('last_added_amount', '') }}" step="1">
                            @if($errors->has('last_added_amount'))
                                <span class="help-block" role="alert">{{ $errors->first('last_added_amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.wallet.fields.last_added_amount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('last_deduct_amount') ? 'has-error' : '' }}">
                            <label for="last_deduct_amount">{{ trans('cruds.wallet.fields.last_deduct_amount') }}</label>
                            <input class="form-control" type="number" name="last_deduct_amount" id="last_deduct_amount" value="{{ old('last_deduct_amount', '') }}" step="1">
                            @if($errors->has('last_deduct_amount'))
                                <span class="help-block" role="alert">{{ $errors->first('last_deduct_amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.wallet.fields.last_deduct_amount_helper') }}</span>
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