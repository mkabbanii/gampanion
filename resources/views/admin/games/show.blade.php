@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.game.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.games.index') }}">
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
                            <a class="btn btn-default" href="{{ route('admin.games.index') }}">
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
                        <a href="#game_orders" aria-controls="game_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.order.title') }}
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#game_gampanions" aria-controls="game_gampanions" role="tab" data-toggle="tab">
                            {{ trans('cruds.gampanion.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="game_orders">
                        @includeIf('admin.games.relationships.gameOrders', ['orders' => $game->gameOrders])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="game_gampanions">
                        @includeIf('admin.games.relationships.gameGampanions', ['gampanions' => $game->gameGampanions])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection