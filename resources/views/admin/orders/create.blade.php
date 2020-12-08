@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.orders.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('game') ? 'has-error' : '' }}">
                            <label for="game_id">{{ trans('cruds.order.fields.game') }}</label>
                            <select class="form-control select2" name="game_id" id="game_id">
                                @foreach($games as $id => $game)
                                    <option value="{{ $id }}" {{ old('game_id') == $id ? 'selected' : '' }}>{{ $game }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('game'))
                                <span class="help-block" role="alert">{{ $errors->first('game') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.game_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label class="required" for="user_id">{{ trans('cruds.order.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label class="required" for="status_id">{{ trans('cruds.order.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id" required>
                                @foreach($statuses as $id => $status)
                                    <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('amount_deducted_from_user') ? 'has-error' : '' }}">
                            <label for="amount_deducted_from_user">{{ trans('cruds.order.fields.amount_deducted_from_user') }}</label>
                            <input class="form-control" type="number" name="amount_deducted_from_user" id="amount_deducted_from_user" value="{{ old('amount_deducted_from_user', '') }}" step="1">
                            @if($errors->has('amount_deducted_from_user'))
                                <span class="help-block" role="alert">{{ $errors->first('amount_deducted_from_user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.amount_deducted_from_user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('amount_earned_by_provider') ? 'has-error' : '' }}">
                            <label class="required" for="amount_earned_by_provider">{{ trans('cruds.order.fields.amount_earned_by_provider') }}</label>
                            <input class="form-control" type="number" name="amount_earned_by_provider" id="amount_earned_by_provider" value="{{ old('amount_earned_by_provider', '') }}" step="1" required>
                            @if($errors->has('amount_earned_by_provider'))
                                <span class="help-block" role="alert">{{ $errors->first('amount_earned_by_provider') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.amount_earned_by_provider_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('note') ? 'has-error' : '' }}">
                            <label for="note">{{ trans('cruds.order.fields.note') }}</label>
                            <input class="form-control" type="text" name="note" id="note" value="{{ old('note', '') }}">
                            @if($errors->has('note'))
                                <span class="help-block" role="alert">{{ $errors->first('note') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.note_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('gampanion') ? 'has-error' : '' }}">
                            <label class="required" for="gampanion_id">{{ trans('cruds.order.fields.gampanion') }}</label>
                            <select class="form-control select2" name="gampanion_id" id="gampanion_id" required>
                                @foreach($gampanions as $id => $gampanion)
                                    <option value="{{ $id }}" {{ old('gampanion_id') == $id ? 'selected' : '' }}>{{ $gampanion }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gampanion'))
                                <span class="help-block" role="alert">{{ $errors->first('gampanion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.gampanion_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            <label class="required" for="quantity">{{ trans('cruds.order.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', '1') }}" step="1" required>
                            @if($errors->has('quantity'))
                                <span class="help-block" role="alert">{{ $errors->first('quantity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('approved_at') ? 'has-error' : '' }}">
                            <label for="approved_at">{{ trans('cruds.order.fields.approved_at') }}</label>
                            <input class="form-control date" type="text" name="approved_at" id="approved_at" value="{{ old('approved_at') }}">
                            @if($errors->has('approved_at'))
                                <span class="help-block" role="alert">{{ $errors->first('approved_at') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.approved_at_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rejected_at') ? 'has-error' : '' }}">
                            <label for="rejected_at">{{ trans('cruds.order.fields.rejected_at') }}</label>
                            <input class="form-control date" type="text" name="rejected_at" id="rejected_at" value="{{ old('rejected_at') }}">
                            @if($errors->has('rejected_at'))
                                <span class="help-block" role="alert">{{ $errors->first('rejected_at') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.rejected_at_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('proposed_time') ? 'has-error' : '' }}">
                            <label for="proposed_time">{{ trans('cruds.order.fields.proposed_time') }}</label>
                            <input class="form-control datetime" type="text" name="proposed_time" id="proposed_time" value="{{ old('proposed_time') }}">
                            @if($errors->has('proposed_time'))
                                <span class="help-block" role="alert">{{ $errors->first('proposed_time') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.proposed_time_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('request_note') ? 'has-error' : '' }}">
                            <label for="request_note">{{ trans('cruds.order.fields.request_note') }}</label>
                            <input class="form-control" type="text" name="request_note" id="request_note" value="{{ old('request_note', '') }}">
                            @if($errors->has('request_note'))
                                <span class="help-block" role="alert">{{ $errors->first('request_note') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.request_note_helper') }}</span>
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