@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addEvent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-events.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addEvent.fields.id') }}
                        </th>
                        <td>
                            {{ $addEvent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addEvent.fields.image') }}
                        </th>
                        <td>
                            @if($addEvent->image)
                                <a href="{{ $addEvent->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $addEvent->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addEvent.fields.title') }}
                        </th>
                        <td>
                            {{ $addEvent->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addEvent.fields.date') }}
                        </th>
                        <td>
                            {{ $addEvent->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addEvent.fields.address') }}
                        </th>
                        <td>
                            {{ $addEvent->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addEvent.fields.eventstart') }}
                        </th>
                        <td>
                            {{ $addEvent->eventstart }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addEvent.fields.sport_name') }}
                        </th>
                        <td>
                            {{ $addEvent->sport_name->sport_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addEvent.fields.schools') }}
                        </th>
                        <td>
                            @foreach($addEvent->schools as $key => $schools)
                                <span class="label label-info">{{ $schools->school_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addEvent.fields.slug') }}
                        </th>
                        <td>
                            {{ $addEvent->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-events.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection