@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addPlayer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-players.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addPlayer.fields.id') }}
                        </th>
                        <td>
                            {{ $addPlayer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addPlayer.fields.name') }}
                        </th>
                        <td>
                            {{ $addPlayer->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addPlayer.fields.class') }}
                        </th>
                        <td>
                            {{ $addPlayer->class }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addPlayer.fields.phone') }}
                        </th>
                        <td>
                            {{ $addPlayer->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addPlayer.fields.email') }}
                        </th>
                        <td>
                            {{ $addPlayer->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addPlayer.fields.age') }}
                        </th>
                        <td>
                            {{ $addPlayer->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addPlayer.fields.father_mother_name') }}
                        </th>
                        <td>
                            {{ $addPlayer->father_mother_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addPlayer.fields.upload_photo') }}
                        </th>
                        <td>
                            @if($addPlayer->upload_photo)
                                <a href="{{ $addPlayer->upload_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $addPlayer->upload_photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addPlayer.fields.registration') }}
                        </th>
                        <td>
                            {{ $addPlayer->registration->school_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addPlayer.fields.event_title') }}
                        </th>
                        <td>
                            {{ $addPlayer->event_title->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-players.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection