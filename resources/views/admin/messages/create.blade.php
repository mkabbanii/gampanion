@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.message.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.messages.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                            <label class="required" for="message">{{ trans('cruds.message.fields.message') }}</label>
                            <input class="form-control" type="text" name="message" id="message" value="{{ old('message', '') }}" required>
                            @if($errors->has('message'))
                                <span class="help-block" role="alert">{{ $errors->first('message') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.message.fields.message_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sender') ? 'has-error' : '' }}">
                            <label class="required" for="sender_id">{{ trans('cruds.message.fields.sender') }}</label>
                            <select class="form-control select2" name="sender_id" id="sender_id" required>
                                @foreach($senders as $id => $sender)
                                    <option value="{{ $id }}" {{ old('sender_id') == $id ? 'selected' : '' }}>{{ $sender }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sender'))
                                <span class="help-block" role="alert">{{ $errors->first('sender') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.message.fields.sender_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('receiver') ? 'has-error' : '' }}">
                            <label class="required" for="receiver_id">{{ trans('cruds.message.fields.receiver') }}</label>
                            <select class="form-control select2" name="receiver_id" id="receiver_id" required>
                                @foreach($receivers as $id => $receiver)
                                    <option value="{{ $id }}" {{ old('receiver_id') == $id ? 'selected' : '' }}>{{ $receiver }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('receiver'))
                                <span class="help-block" role="alert">{{ $errors->first('receiver') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.message.fields.receiver_helper') }}</span>
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