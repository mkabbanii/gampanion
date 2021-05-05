@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.review.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.reviews.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.review.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $review->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.review.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $review->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.review.fields.comment') }}
                                    </th>
                                    <td>
                                        {{ $review->comment }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.review.fields.user_rate_value') }}
                                    </th>
                                    <td>
                                        {{ $review->user_rate_value }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.review.fields.is_recommend') }}
                                    </th>
                                    <td>
                                        {{ $review->is_recommend }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.review.fields.gampanion') }}
                                    </th>
                                    <td>
                                        {{ $review->gampanion->level ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.reviews.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection