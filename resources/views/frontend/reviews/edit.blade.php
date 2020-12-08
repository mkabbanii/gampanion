@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.review.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.reviews.update", [$review->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="user_id">{{ trans('cruds.review.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $review->user->id ?? '') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.review.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="comment">{{ trans('cruds.review.fields.comment') }}</label>
                            <input class="form-control" type="text" name="comment" id="comment" value="{{ old('comment', $review->comment) }}">
                            @if($errors->has('comment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('comment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.review.fields.comment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="user_rate_value">{{ trans('cruds.review.fields.user_rate_value') }}</label>
                            <input class="form-control" type="number" name="user_rate_value" id="user_rate_value" value="{{ old('user_rate_value', $review->user_rate_value) }}" step="0.1" min="1" max="5">
                            @if($errors->has('user_rate_value'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user_rate_value') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.review.fields.user_rate_value_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="is_recommend">{{ trans('cruds.review.fields.is_recommend') }}</label>
                            <input class="form-control" type="number" name="is_recommend" id="is_recommend" value="{{ old('is_recommend', $review->is_recommend) }}" step="1">
                            @if($errors->has('is_recommend'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_recommend') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.review.fields.is_recommend_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="gampanion_id">{{ trans('cruds.review.fields.gampanion') }}</label>
                            <select class="form-control select2" name="gampanion_id" id="gampanion_id" required>
                                @foreach($gampanions as $id => $gampanion)
                                    <option value="{{ $id }}" {{ (old('gampanion_id') ? old('gampanion_id') : $review->gampanion->id ?? '') == $id ? 'selected' : '' }}>{{ $gampanion }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gampanion'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gampanion') }}
                                </div>
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