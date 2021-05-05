@extends('layouts.admin')
@section('content')
<div class="content">
    @can('order_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.orders.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.order.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Order">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.order.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.order.fields.game') }}
                                </th>
                                <th>
                                    {{ trans('cruds.order.fields.user') }}
                                </th>
                                <th>
                                    {{ trans('cruds.user.fields.email') }}
                                </th>
                                <th>
                                    {{ trans('cruds.order.fields.status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.order.fields.gampanion') }}
                                </th>
                                <th>
                                    {{ trans('cruds.gampanion.fields.level') }}
                                </th>
                                <th>
                                    {{ trans('cruds.order.fields.quantity') }}
                                </th>
                                <th>
                                    {{ trans('cruds.order.fields.approved_at') }}
                                </th>
                                <th>
                                    {{ trans('cruds.order.fields.rejected_at') }}
                                </th>
                                <th>
                                    {{ trans('cruds.order.fields.proposed_time') }}
                                </th>
                                <th>
                                    {{ trans('cruds.order.fields.request_note') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                    </table>
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
@can('order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.orders.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.orders.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'game_game_name', name: 'game.game_name' },
{ data: 'user_name', name: 'user.name' },
{ data: 'user.email', name: 'user.email' },
{ data: 'status_status', name: 'status.status' },
{ data: 'gampanion_level', name: 'gampanion.level' },
{ data: 'gampanion.level', name: 'gampanion.level' },
{ data: 'quantity', name: 'quantity' },
{ data: 'approved_at', name: 'approved_at' },
{ data: 'rejected_at', name: 'rejected_at' },
{ data: 'proposed_time', name: 'proposed_time' },
{ data: 'request_note', name: 'request_note' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Order').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection