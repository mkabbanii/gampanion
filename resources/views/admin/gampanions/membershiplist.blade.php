@extends('layouts.admin')
@section('content')
<div class="content">
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
                                        {{ trans('cruds.gampanion.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    
                                    <th>
                                        {{ trans('cruds.game.title') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                
                                @foreach($users as $key => $user)
                                    @if(count(json_decode($user->userGampanions))>0)
                                    <tr data-entry-id="{{ $user->id }}">
                                        <td ></td>
                                        <td >  {{ $user->name ?? '' }}</td>
                                        <td>
                                            {{ $user->email ?? '' }}
                                        </td>
                                        <td >
                                            <table>
                                            @foreach($user->userGampanions as $key => $gampanion)
                                            <tr>
                                             <td>
                                                {{ $gampanion->game->game_name ?? '' }}</td><td>
                                        
                                                <span class="btn btn-xs btn-primary">Cost : {{ $gampanion->cost ?? '' }}</span></td><td>
                                            
                                                @if($gampanion->photo)
                                                    <a href="{{ $gampanion->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                        <img src="{{ $gampanion->photo->getUrl('thumb') }}">
                                                    </a>
                                                @endif
                                                </td></tr>
                                            @endforeach
                                            </table>
                                        </td>
                                        <td> 
                                            <form action="{{ route('admin.gampanions.acceptmembership', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="POST">
                                                    <input type="hidden" name="_iduser" value="{{$user->id}}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-success" value="{{ trans('global.acceptMemberShip') }}">
                                            </form>
                                            <form action="{{ route('admin.gampanions.declinemembership', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="POST">
                                                <input type="hidden" name="_iduser" value="{{$user->id}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.deniedMemberShip') }}">
                                        </form>
                                        </td>
                                    </tr>
                                    @endif
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
    //order: [[ 1, 'desc' ]],
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