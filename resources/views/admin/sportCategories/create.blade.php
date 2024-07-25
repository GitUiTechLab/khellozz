@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.sportCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sport-categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="sport_name">{{ trans('cruds.sportCategory.fields.sport_name') }}</label>
                <input class="form-control {{ $errors->has('sport_name') ? 'is-invalid' : '' }}" type="text" name="sport_name" id="sport_name" value="{{ old('sport_name', '') }}" required>
                @if($errors->has('sport_name'))
                    <span class="text-danger">{{ $errors->first('sport_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sportCategory.fields.sport_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slug">{{ trans('cruds.sportCategory.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}" required>
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sportCategory.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection