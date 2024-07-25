@extends('layouts.admin')
@section('content')
@can('add_event_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.add-events.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.addEvent.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'AddEvent', 'route' => 'admin.add-events.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.addEvent.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-AddEvent">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.addEvent.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.addEvent.fields.image') }}
                    </th>
                    <th>
                        {{ trans('cruds.addEvent.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.addEvent.fields.date') }}
                    </th>
                    <th>
                        {{ trans('cruds.addEvent.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.addEvent.fields.eventstart') }}
                    </th>
                    <th>
                        {{ trans('cruds.addEvent.fields.sport_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.addEvent.fields.schools') }}
                    </th>
                    <th>
                        {{ trans('cruds.addEvent.fields.slug') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('add_event_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.add-events.massDestroy') }}",
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
    ajax: "{{ route('admin.add-events.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'image', name: 'image', sortable: false, searchable: false },
{ data: 'title', name: 'title' },
{ data: 'date', name: 'date' },
{ data: 'address', name: 'address' },
{ data: 'eventstart', name: 'eventstart' },
{ data: 'sport_name_sport_name', name: 'sport_name.sport_name' },
{ data: 'schools', name: 'schools.school_name' },
{ data: 'slug', name: 'slug' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-AddEvent').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection