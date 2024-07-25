@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.addEvent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.add-events.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.addEvent.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addEvent.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.addEvent.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addEvent.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.addEvent.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date') }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addEvent.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.addEvent.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address" required>{{ old('address') }}</textarea>
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addEvent.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="eventstart">{{ trans('cruds.addEvent.fields.eventstart') }}</label>
                <input class="form-control {{ $errors->has('eventstart') ? 'is-invalid' : '' }}" type="text" name="eventstart" id="eventstart" value="{{ old('eventstart', '') }}" required>
                @if($errors->has('eventstart'))
                    <span class="text-danger">{{ $errors->first('eventstart') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addEvent.fields.eventstart_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sport_name_id">{{ trans('cruds.addEvent.fields.sport_name') }}</label>
                <select class="form-control select2 {{ $errors->has('sport_name') ? 'is-invalid' : '' }}" name="sport_name_id" id="sport_name_id" required>
                    @foreach($sport_names as $id => $entry)
                        <option value="{{ $id }}" {{ old('sport_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sport_name'))
                    <span class="text-danger">{{ $errors->first('sport_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addEvent.fields.sport_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="schools">{{ trans('cruds.addEvent.fields.schools') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('schools') ? 'is-invalid' : '' }}" name="schools[]" id="schools" multiple required>
                    @foreach($schools as $id => $school)
                        <option value="{{ $id }}" {{ in_array($id, old('schools', [])) ? 'selected' : '' }}>{{ $school }}</option>
                    @endforeach
                </select>
                @if($errors->has('schools'))
                    <span class="text-danger">{{ $errors->first('schools') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addEvent.fields.schools_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slug">{{ trans('cruds.addEvent.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}" required>
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.addEvent.fields.slug_helper') }}</span>
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
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.add-events.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($addEvent) && $addEvent->image)
      var file = {!! json_encode($addEvent->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
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