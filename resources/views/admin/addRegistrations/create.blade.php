@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.addRegistration.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.add-registrations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="school_name">{{ trans('cruds.addRegistration.fields.school_name') }}</label>
                <input class="form-control {{ $errors->has('school_name') ? 'is-invalid' : '' }}" type="text" name="school_name" id="school_name" value="{{ old('school_name', '') }}" required>
                @if($errors->has('school_name'))
                    <span class="text-danger">{{ $errors->first('school_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addRegistration.fields.school_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="age">{{ trans('cruds.addRegistration.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="text" name="age" id="age" value="{{ old('age', '') }}" required>
                @if($errors->has('age'))
                    <span class="text-danger">{{ $errors->first('age') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addRegistration.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sport_name_id">{{ trans('cruds.addRegistration.fields.sport_name') }}</label>
                <select class="form-control select2 {{ $errors->has('sport_name') ? 'is-invalid' : '' }}" name="sport_name_id" id="sport_name_id" required>
                    @foreach($sport_names as $id => $entry)
                        <option value="{{ $id }}" {{ old('sport_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sport_name'))
                    <span class="text-danger">{{ $errors->first('sport_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addRegistration.fields.sport_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.addRegistration.fields.gender') }}</label>
                @foreach(App\Models\AddRegistration::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addRegistration.fields.gender_helper') }}</span>
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