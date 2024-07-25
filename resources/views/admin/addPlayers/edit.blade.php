@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.addPlayer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.add-players.update", [$addPlayer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.addPlayer.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $addPlayer->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addPlayer.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="class">{{ trans('cruds.addPlayer.fields.class') }}</label>
                <input class="form-control {{ $errors->has('class') ? 'is-invalid' : '' }}" type="text" name="class" id="class" value="{{ old('class', $addPlayer->class) }}" required>
                @if($errors->has('class'))
                    <span class="text-danger">{{ $errors->first('class') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addPlayer.fields.class_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.addPlayer.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $addPlayer->phone) }}" required>
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addPlayer.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.addPlayer.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $addPlayer->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addPlayer.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="age">{{ trans('cruds.addPlayer.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="number" name="age" id="age" value="{{ old('age', $addPlayer->age) }}" step="1" required>
                @if($errors->has('age'))
                    <span class="text-danger">{{ $errors->first('age') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addPlayer.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="father_mother_name">{{ trans('cruds.addPlayer.fields.father_mother_name') }}</label>
                <input class="form-control {{ $errors->has('father_mother_name') ? 'is-invalid' : '' }}" type="text" name="father_mother_name" id="father_mother_name" value="{{ old('father_mother_name', $addPlayer->father_mother_name) }}" required>
                @if($errors->has('father_mother_name'))
                    <span class="text-danger">{{ $errors->first('father_mother_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addPlayer.fields.father_mother_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="upload_photo">{{ trans('cruds.addPlayer.fields.upload_photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('upload_photo') ? 'is-invalid' : '' }}" id="upload_photo-dropzone">
                </div>
                @if($errors->has('upload_photo'))
                    <span class="text-danger">{{ $errors->first('upload_photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addPlayer.fields.upload_photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="registration_id">{{ trans('cruds.addPlayer.fields.registration') }}</label>
                <select class="form-control select2 {{ $errors->has('registration') ? 'is-invalid' : '' }}" name="registration_id" id="registration_id" required>
                    @foreach($registrations as $id => $entry)
                        <option value="{{ $id }}" {{ (old('registration_id') ? old('registration_id') : $addPlayer->registration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('registration'))
                    <span class="text-danger">{{ $errors->first('registration') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addPlayer.fields.registration_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="event_title_id">{{ trans('cruds.addPlayer.fields.event_title') }}</label>
                <select class="form-control select2 {{ $errors->has('event_title') ? 'is-invalid' : '' }}" name="event_title_id" id="event_title_id" required>
                    @foreach($event_titles as $id => $entry)
                        <option value="{{ $id }}" {{ (old('event_title_id') ? old('event_title_id') : $addPlayer->event_title->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('event_title'))
                    <span class="text-danger">{{ $errors->first('event_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addPlayer.fields.event_title_helper') }}</span>
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
    Dropzone.options.uploadPhotoDropzone = {
    url: '{{ route('admin.add-players.storeMedia') }}',
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
      $('form').find('input[name="upload_photo"]').remove()
      $('form').append('<input type="hidden" name="upload_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="upload_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($addPlayer) && $addPlayer->upload_photo)
      var file = {!! json_encode($addPlayer->upload_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="upload_photo" value="' + file.file_name + '">')
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