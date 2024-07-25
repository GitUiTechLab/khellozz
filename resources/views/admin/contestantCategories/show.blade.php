@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.contestantCategory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contestant-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.contestantCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $contestantCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contestantCategory.fields.category_name') }}
                        </th>
                        <td>
                            {{ $contestantCategory->category_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contestantCategory.fields.category_image') }}
                        </th>
                        <td>
                            @if($contestantCategory->category_image)
                                <a href="{{ $contestantCategory->category_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $contestantCategory->category_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contestantCategory.fields.slug') }}
                        </th>
                        <td>
                            {{ $contestantCategory->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contestant-categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection