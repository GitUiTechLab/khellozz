@extends('layouts.admin')
@section('content')
@can('add_player_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.add-players.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.addPlayer.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'AddPlayer', 'route' => 'admin.add-players.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.addPlayer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-AddPlayer">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.addPlayer.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.addPlayer.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.addPlayer.fields.class') }}
                    </th>
                    <th>
                        {{ trans('cruds.addPlayer.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.addPlayer.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.addPlayer.fields.age') }}
                    </th>
                    <th>
                        {{ trans('cruds.addPlayer.fields.father_mother_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.addPlayer.fields.upload_photo') }}
                    </th>
                    <th>
                        {{ trans('cruds.addPlayer.fields.registration') }}
                    </th>
                    <th>
                        {{ trans('cruds.addPlayer.fields.event_title') }}
                    </th>
                    <th>
                        {{ trans('cruds.addEvent.fields.date') }}
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
@can('add_player_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.add-players.massDestroy') }}",
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
    ajax: "{{ route('admin.add-players.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'class', name: 'class' },
{ data: 'phone', name: 'phone' },
{ data: 'email', name: 'email' },
{ data: 'age', name: 'age' },
{ data: 'father_mother_name', name: 'father_mother_name' },
{ data: 'upload_photo', name: 'upload_photo', sortable: false, searchable: false },
{ data: 'registration_school_name', name: 'registration.school_name' },
{ data: 'event_title_title', name: 'event_title.title' },
{ data: 'event_title.date', name: 'event_title.date' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-AddPlayer').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection