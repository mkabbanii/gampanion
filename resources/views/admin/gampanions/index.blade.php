@extends('layouts.admin')
@section('content')
<div class="content">
    @can('gampanion_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.gampanions.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.gampanion.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.gampanion.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Gampanion">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.game') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.game.fields.game_info') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.cost') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.level') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.server') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.platform') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.availability') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.photo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.discount') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.gampanion.fields.other_game') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gampanions as $key => $gampanion)
                                    <tr data-entry-id="{{ $gampanion->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $gampanion->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gampanion->game->game_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gampanion->game->game_info ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gampanion->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gampanion->user->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gampanion->cost ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gampanion->level ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gampanion->server ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gampanion->platform ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $gampanion->availability ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $gampanion->availability ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @if($gampanion->photo)
                                                <a href="{{ $gampanion->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $gampanion->photo->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $gampanion->discount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $gampanion->other_game ?? '' }}
                                        </td>
                                        <td>
                                            @can('gampanion_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.gampanions.show', $gampanion->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('gampanion_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.gampanions.edit', $gampanion->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('gampanion_delete')
                                                <form action="{{ route('admin.gampanions.destroy', $gampanion->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('gampanion_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.gampanions.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Gampanion:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection