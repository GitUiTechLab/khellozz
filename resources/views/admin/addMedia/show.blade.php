@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addMedium.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-media.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addMedium.fields.id') }}
                        </th>
                        <td>
                            {{ $addMedium->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addMedium.fields.image') }}
                        </th>
                        <td>
                            @if($addMedium->image)
                                <a href="{{ $addMedium->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $addMedium->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addMedium.fields.date') }}
                        </th>
                        <td>
                            {{ $addMedium->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addMedium.fields.title') }}
                        </th>
                        <td>
                            {{ $addMedium->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addMedium.fields.description') }}
                        </th>
                        <td>
                            {{ $addMedium->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-media.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection