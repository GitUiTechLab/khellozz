@extends('layouts.admin')
@section('content')
@can('add_achievement_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.add-achievements.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.addAchievement.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'AddAchievement', 'route' => 'admin.add-achievements.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.addAchievement.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-AddAchievement">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.addAchievement.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.addAchievement.fields.player_image') }}
                    </th>
                    <th>
                        {{ trans('cruds.addAchievement.fields.player_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.addAchievement.fields.sport_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.addAchievement.fields.age') }}
                    </th>
                    <th>
                        {{ trans('cruds.addAchievement.fields.medal_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.addAchievement.fields.description') }}
                    </th>
                    <th>
                        {{ trans('cruds.addAchievement.fields.school_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.addAchievement.fields.class') }}
                    </th>
                    <th>
                        {{ trans('cruds.addAchievement.fields.date') }}
                    </th>
                    <th>
                        {{ trans('cruds.addAchievement.fields.certificate') }}
                    </th>
                    <th>
                        {{ trans('cruds.addAchievement.fields.slug') }}
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
@can('add_achievement_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.add-achievements.massDestroy') }}",
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
    ajax: "{{ route('admin.add-achievements.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'player_image', name: 'player_image', sortable: false, searchable: false },
{ data: 'player_name', name: 'player_name' },
{ data: 'sport_name_sport_name', name: 'sport_name.sport_name' },
{ data: 'age', name: 'age' },
{ data: 'medal_type', name: 'medal_type' },
{ data: 'description', name: 'description' },
{ data: 'school_name', name: 'school_name' },
{ data: 'class', name: 'class' },
{ data: 'date', name: 'date' },
{ data: 'certificate', name: 'certificate', sortable: false, searchable: false },
{ data: 'slug', name: 'slug' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-AddAchievement').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection