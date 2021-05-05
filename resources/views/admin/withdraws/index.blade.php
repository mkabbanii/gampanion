@extends('layouts.admin')
@section('content')
<div class="content">
    @can('withdraw_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.withdraws.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.withdraw.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.withdraw.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Withdraw">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.points') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.cash_amount') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.payment_method') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.payment_copy') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.note') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.withdraw.fields.status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($withdraws as $key => $withdraw)
                                    <tr data-entry-id="{{ $withdraw->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $withdraw->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $withdraw->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $withdraw->points ?? '' }}
                                        </td>
                                        <td>
                                            {{ $withdraw->cash_amount ?? '' }}
                                        </td>
                                        <td>
                                            {{ $withdraw->payment_method->method ?? '' }}
                                        </td>
                                        <td>
                                            @if($withdraw->payment_copy)
                                                <a href="{{ $withdraw->payment_copy->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $withdraw->note ?? '' }}
                                        </td>
                                        <td>
                                            {{ $withdraw->status->status ?? '' }}
                                        </td>
                                        <td>
                                            @can('withdraw_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.withdraws.show', $withdraw->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('withdraw_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.withdraws.edit', $withdraw->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('withdraw_delete')
                                                <form action="{{ route('admin.withdraws.destroy', $withdraw->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('withdraw_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.withdraws.massDestroy') }}",
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
  let table = $('.datatable-Withdraw:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection