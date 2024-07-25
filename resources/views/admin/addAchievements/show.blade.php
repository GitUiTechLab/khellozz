@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addAchievement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-achievements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addAchievement.fields.id') }}
                        </th>
                        <td>
                            {{ $addAchievement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addAchievement.fields.player_image') }}
                        </th>
                        <td>
                            @if($addAchievement->player_image)
                                <a href="{{ $addAchievement->player_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $addAchievement->player_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addAchievement.fields.player_name') }}
                        </th>
                        <td>
                            {{ $addAchievement->player_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addAchievement.fields.sport_name') }}
                        </th>
                        <td>
                            {{ $addAchievement->sport_name->sport_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addAchievement.fields.age') }}
                        </th>
                        <td>
                            {{ $addAchievement->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addAchievement.fields.medal_type') }}
                        </th>
                        <td>
                            {{ $addAchievement->medal_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addAchievement.fields.description') }}
                        </th>
                        <td>
                            {{ $addAchievement->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addAchievement.fields.school_name') }}
                        </th>
                        <td>
                            {{ $addAchievement->school_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addAchievement.fields.class') }}
                        </th>
                        <td>
                            {{ $addAchievement->class }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addAchievement.fields.date') }}
                        </th>
                        <td>
                            {{ $addAchievement->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addAchievement.fields.certificate') }}
                        </th>
                        <td>
                            @if($addAchievement->certificate)
                                <a href="{{ $addAchievement->certificate->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $addAchievement->certificate->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addAchievement.fields.slug') }}
                        </th>
                        <td>
                            {{ $addAchievement->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-achievements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection