@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addBlog.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-blogs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addBlog.fields.id') }}
                        </th>
                        <td>
                            {{ $addBlog->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addBlog.fields.title') }}
                        </th>
                        <td>
                            {{ $addBlog->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addBlog.fields.description') }}
                        </th>
                        <td>
                            {{ $addBlog->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addBlog.fields.image') }}
                        </th>
                        <td>
                            @if($addBlog->image)
                                <a href="{{ $addBlog->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $addBlog->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addBlog.fields.date') }}
                        </th>
                        <td>
                            {{ $addBlog->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addBlog.fields.sport_name') }}
                        </th>
                        <td>
                            {{ $addBlog->sport_name->sport_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addBlog.fields.slug') }}
                        </th>
                        <td>
                            {{ $addBlog->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-blogs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection