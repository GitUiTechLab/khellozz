@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.addAchievement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.add-achievements.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="player_image">{{ trans('cruds.addAchievement.fields.player_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('player_image') ? 'is-invalid' : '' }}" id="player_image-dropzone">
                </div>
                @if($errors->has('player_image'))
                    <span class="text-danger">{{ $errors->first('player_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addAchievement.fields.player_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="player_name">{{ trans('cruds.addAchievement.fields.player_name') }}</label>
                <input class="form-control {{ $errors->has('player_name') ? 'is-invalid' : '' }}" type="text" name="player_name" id="player_name" value="{{ old('player_name', '') }}" required>
                @if($errors->has('player_name'))
                    <span class="text-danger">{{ $errors->first('player_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addAchievement.fields.player_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sport_name_id">{{ trans('cruds.addAchievement.fields.sport_name') }}</label>
                <select class="form-control select2 {{ $errors->has('sport_name') ? 'is-invalid' : '' }}" name="sport_name_id" id="sport_name_id" required>
                    @foreach($sport_names as $id => $entry)
                        <option value="{{ $id }}" {{ old('sport_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sport_name'))
                    <span class="text-danger">{{ $errors->first('sport_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addAchievement.fields.sport_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="age">{{ trans('cruds.addAchievement.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="number" name="age" id="age" value="{{ old('age', '') }}" step="1" required>
                @if($errors->has('age'))
                    <span class="text-danger">{{ $errors->first('age') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addAchievement.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="medal_type">{{ trans('cruds.addAchievement.fields.medal_type') }}</label>
                <input class="form-control {{ $errors->has('medal_type') ? 'is-invalid' : '' }}" type="text" name="medal_type" id="medal_type" value="{{ old('medal_type', '') }}" required>
                @if($errors->has('medal_type'))
                    <span class="text-danger">{{ $errors->first('medal_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addAchievement.fields.medal_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.addAchievement.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addAchievement.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="school_name">{{ trans('cruds.addAchievement.fields.school_name') }}</label>
                <input class="form-control {{ $errors->has('school_name') ? 'is-invalid' : '' }}" type="text" name="school_name" id="school_name" value="{{ old('school_name', '') }}" required>
                @if($errors->has('school_name'))
                    <span class="text-danger">{{ $errors->first('school_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addAchievement.fields.school_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="class">{{ trans('cruds.addAchievement.fields.class') }}</label>
                <input class="form-control {{ $errors->has('class') ? 'is-invalid' : '' }}" type="text" name="class" id="class" value="{{ old('class', '') }}" required>
                @if($errors->has('class'))
                    <span class="text-danger">{{ $errors->first('class') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addAchievement.fields.class_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.addAchievement.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addAchievement.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="certificate">{{ trans('cruds.addAchievement.fields.certificate') }}</label>
                <div class="needsclick dropzone {{ $errors->has('certificate') ? 'is-invalid' : '' }}" id="certificate-dropzone">
                </div>
                @if($errors->has('certificate'))
                    <span class="text-danger">{{ $errors->first('certificate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addAchievement.fields.certificate_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slug">{{ trans('cruds.addAchievement.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}" required>
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addAchievement.fields.slug_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.playerImageDropzone = {
    url: '{{ route('admin.add-achievements.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="player_image"]').remove()
      $('form').append('<input type="hidden" name="player_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="player_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($addAchievement) && $addAchievement->player_image)
      var file = {!! json_encode($addAchievement->player_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="player_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    Dropzone.options.certificateDropzone = {
    url: '{{ route('admin.add-achievements.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="certificate"]').remove()
      $('form').append('<input type="hidden" name="certificate" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="certificate"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($addAchievement) && $addAchievement->certificate)
      var file = {!! json_encode($addAchievement->certificate) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="certificate" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection