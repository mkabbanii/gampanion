@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.status.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.statuses.update", [$status->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label class="required" for="status">{{ trans('cruds.status.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', $status->status) }}" required>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.status.fields.status_helper') }}</span>
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