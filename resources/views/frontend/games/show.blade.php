@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.game.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.games.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.game.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $game->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.game.fields.game_name') }}
                                    </th>
                                    <td>
                                        {{ $game->game_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.game.fields.game_info') }}
                                    </th>
                                    <td>
                                        {{ $game->game_info }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.game.fields.game_photo') }}
                                    </th>
                                    <td>
                                        @if($game->game_photo)
                                            <a href="{{ $game->game_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $game->game_photo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.game.fields.note') }}
                                    </th>
                                    <td>
                                        {{ $game->note }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.game.fields.is_featured') }}
                                    </th>
                                    <td>
                                        {{ $game->is_featured }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.games.index') }}">
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