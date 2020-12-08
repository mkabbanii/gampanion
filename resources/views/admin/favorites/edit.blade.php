@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.favorite.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.favorites.update", [$favorite->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label for="user_id">{{ trans('cruds.favorite.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $favorite->user->id ?? '') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.favorite.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('favorite_user') ? 'has-error' : '' }}">
                            <label for="favorite_user_id">{{ trans('cruds.favorite.fields.favorite_user') }}</label>
                            <select class="form-control select2" name="favorite_user_id" id="favorite_user_id">
                                @foreach($favorite_users as $id => $favorite_user)
                                    <option value="{{ $id }}" {{ (old('favorite_user_id') ? old('favorite_user_id') : $favorite->favorite_user->id ?? '') == $id ? 'selected' : '' }}>{{ $favorite_user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('favorite_user'))
                                <span class="help-block" role="alert">{{ $errors->first('favorite_user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.favorite.fields.favorite_user_helper') }}</span>
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