@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addContestant.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-contestants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addContestant.fields.id') }}
                        </th>
                        <td>
                            {{ $addContestant->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addContestant.fields.title') }}
                        </th>
                        <td>
                            {{ $addContestant->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addContestant.fields.description') }}
                        </th>
                        <td>
                            {{ $addContestant->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addContestant.fields.slug') }}
                        </th>
                        <td>
                            {{ $addContestant->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-contestants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection