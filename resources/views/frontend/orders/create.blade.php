@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.orders.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="game_id">{{ trans('cruds.order.fields.game') }}</label>
                            <select class="form-control select2" name="game_id" id="game_id">
                                @foreach($games as $id => $game)
                                    <option value="{{ $id }}" {{ old('game_id') == $id ? 'selected' : '' }}>{{ $game }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('game'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('game') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.game_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.order.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="status_id">{{ trans('cruds.order.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id" required>
                                @foreach($statuses as $id => $status)
                                    <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="amount_deducted_from_user">{{ trans('cruds.order.fields.amount_deducted_from_user') }}</label>
                            <input class="form-control" type="number" name="amount_deducted_from_user" id="amount_deducted_from_user" value="{{ old('amount_deducted_from_user', '') }}" step="1">
                            @if($errors->has('amount_deducted_from_user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount_deducted_from_user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.amount_deducted_from_user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="amount_earned_by_provider">{{ trans('cruds.order.fields.amount_earned_by_provider') }}</label>
                            <input class="form-control" type="number" name="amount_earned_by_provider" id="amount_earned_by_provider" value="{{ old('amount_earned_by_provider', '') }}" step="1" required>
                            @if($errors->has('amount_earned_by_provider'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount_earned_by_provider') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.amount_earned_by_provider_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="note">{{ trans('cruds.order.fields.note') }}</label>
                            <input class="form-control" type="text" name="note" id="note" value="{{ old('note', '') }}">
                            @if($errors->has('note'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('note') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.note_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="gampanion_id">{{ trans('cruds.order.fields.gampanion') }}</label>
                            <select class="form-control select2" name="gampanion_id" id="gampanion_id" required>
                                @foreach($gampanions as $id => $gampanion)
                                    <option value="{{ $id }}" {{ old('gampanion_id') == $id ? 'selected' : '' }}>{{ $gampanion }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gampanion'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gampanion') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.gampanion_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="quantity">{{ trans('cruds.order.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', '1') }}" step="1" required>
                            @if($errors->has('quantity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('quantity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="approved_at">{{ trans('cruds.order.fields.approved_at') }}</label>
                            <input class="form-control date" type="text" name="approved_at" id="approved_at" value="{{ old('approved_at') }}">
                            @if($errors->has('approved_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('approved_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.approved_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="rejected_at">{{ trans('cruds.order.fields.rejected_at') }}</label>
                            <input class="form-control date" type="text" name="rejected_at" id="rejected_at" value="{{ old('rejected_at') }}">
                            @if($errors->has('rejected_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('rejected_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.rejected_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="proposed_time">{{ trans('cruds.order.fields.proposed_time') }}</label>
                            <input class="form-control datetime" type="text" name="proposed_time" id="proposed_time" value="{{ old('proposed_time') }}">
                            @if($errors->has('proposed_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('proposed_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.proposed_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="request_note">{{ trans('cruds.order.fields.request_note') }}</label>
                            <input class="form-control" type="text" name="request_note" id="request_note" value="{{ old('request_note', '') }}">
                            @if($errors->has('request_note'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('request_note') }}
                                </div>
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