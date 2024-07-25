@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addReview.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-reviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addReview.fields.id') }}
                        </th>
                        <td>
                            {{ $addReview->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addReview.fields.title') }}
                        </th>
                        <td>
                            {{ $addReview->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addReview.fields.review') }}
                        </th>
                        <td>
                            {{ $addReview->review }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addReview.fields.image') }}
                        </th>
                        <td>
                            @if($addReview->image)
                                <a href="{{ $addReview->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $addReview->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addReview.fields.reviewer_name') }}
                        </th>
                        <td>
                            {{ $addReview->reviewer_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addReview.fields.address') }}
                        </th>
                        <td>
                            {{ $addReview->address }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-reviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection