@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addSport.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-sports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addSport.fields.id') }}
                        </th>
                        <td>
                            {{ $addSport->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addSport.fields.image') }}
                        </th>
                        <td>
                            @if($addSport->image)
                                <a href="{{ $addSport->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $addSport->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addSport.fields.title') }}
                        </th>
                        <td>
                            {{ $addSport->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addSport.fields.description') }}
                        </th>
                        <td>
                            {{ $addSport->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addSport.fields.sport_name') }}
                        </th>
                        <td>
                            {{ $addSport->sport_name->sport_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addSport.fields.slug') }}
                        </th>
                        <td>
                            {{ $addSport->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-sports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection