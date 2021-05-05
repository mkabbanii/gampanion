@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.systemString.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.system-strings.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
                            <label for="key">{{ trans('cruds.systemString.fields.key') }}</label>
                            <input class="form-control" type="text" name="key" id="key" value="{{ old('key', '') }}">
                            @if($errors->has('key'))
                                <span class="help-block" role="alert">{{ $errors->first('key') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.systemString.fields.key_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('value') ? 'has-error' : '' }}">
                            <label for="value">{{ trans('cruds.systemString.fields.value') }}</label>
                            <input class="form-control" type="text" name="value" id="value" value="{{ old('value', '') }}">
                            @if($errors->has('value'))
                                <span class="help-block" role="alert">{{ $errors->first('value') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.systemString.fields.value_helper') }}</span>
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