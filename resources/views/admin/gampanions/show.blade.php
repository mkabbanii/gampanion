@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.gampanion.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.gampanions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $gampanion->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.game') }}
                                    </th>
                                    <td>
                                        {{ $gampanion->game->game_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $gampanion->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.cost') }}
                                    </th>
                                    <td>
                                        {{ $gampanion->cost }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.level') }}
                                    </th>
                                    <td>
                                        {{ $gampanion->level }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.server') }}
                                    </th>
                                    <td>
                                        {{ $gampanion->server }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.platform') }}
                                    </th>
                                    <td>
                                        {{ $gampanion->platform }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.availability') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $gampanion->availability ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.photo') }}
                                    </th>
                                    <td>
                                        @if($gampanion->photo)
                                            <a href="{{ $gampanion->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $gampanion->photo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.discount') }}
                                    </th>
                                    <td>
                                        {{ $gampanion->discount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.other_game') }}
                                    </th>
                                    <td>
                                        {{ $gampanion->other_game }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.gampanions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#gampanion_reviews" aria-controls="gampanion_reviews" role="tab" data-toggle="tab">
                            {{ trans('cruds.review.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#gampanion_orders" aria-controls="gampanion_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.order.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="gampanion_reviews">
                        @includeIf('admin.gampanions.relationships.gampanionReviews', ['reviews' => $gampanion->gampanionReviews])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="gampanion_orders">
                        @includeIf('admin.gampanions.relationships.gampanionOrders', ['orders' => $gampanion->gampanionOrders])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection