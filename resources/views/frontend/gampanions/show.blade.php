@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.gampanion.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.gampanions.index') }}">
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
                            <a class="btn btn-default" href="{{ route('frontend.gampanions.index') }}">
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