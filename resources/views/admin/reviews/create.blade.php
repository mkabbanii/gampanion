@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.review.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.reviews.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label class="required" for="user_id">{{ trans('cruds.review.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.review.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
                            <label for="comment">{{ trans('cruds.review.fields.comment') }}</label>
                            <input class="form-control" type="text" name="comment" id="comment" value="{{ old('comment', '') }}">
                            @if($errors->has('comment'))
                                <span class="help-block" role="alert">{{ $errors->first('comment') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.review.fields.comment_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user_rate_value') ? 'has-error' : '' }}">
                            <label for="user_rate_value">{{ trans('cruds.review.fields.user_rate_value') }}</label>
                            <input class="form-control" type="number" name="user_rate_value" id="user_rate_value" value="{{ old('user_rate_value', '') }}" step="0.1" min="1" max="5">
                            @if($errors->has('user_rate_value'))
                                <span class="help-block" role="alert">{{ $errors->first('user_rate_value') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.review.fields.user_rate_value_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_recommend') ? 'has-error' : '' }}">
                            <label for="is_recommend">{{ trans('cruds.review.fields.is_recommend') }}</label>
                            <input class="form-control" type="number" name="is_recommend" id="is_recommend" value="{{ old('is_recommend', '0') }}" step="1">
                            @if($errors->has('is_recommend'))
                                <span class="help-block" role="alert">{{ $errors->first('is_recommend') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.review.fields.is_recommend_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('gampanion') ? 'has-error' : '' }}">
                            <label class="required" for="gampanion_id">{{ trans('cruds.review.fields.gampanion') }}</label>
                            <select class="form-control select2" name="gampanion_id" id="gampanion_id" required>
                                @foreach($gampanions as $id => $gampanion)
                                    <option value="{{ $id }}" {{ old('gampanion_id') == $id ? 'selected' : '' }}>{{ $gampanion }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gampanion'))
                                <span class="help-block" role="alert">{{ $errors->first('gampanion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.review.fields.gampanion_helper') }}</span>
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