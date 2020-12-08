@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.review.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.reviews.index') }}">
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
                            <a class="btn btn-default" href="{{ route('admin.reviews.index') }}">
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