@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.contactForm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contact-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.contactForm.fields.id') }}
                        </th>
                        <td>
                            {{ $contactForm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactForm.fields.name') }}
                        </th>
                        <td>
                            {{ $contactForm->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactForm.fields.email') }}
                        </th>
                        <td>
                            {{ $contactForm->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactForm.fields.phone') }}
                        </th>
                        <td>
                            {{ $contactForm->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactForm.fields.message') }}
                        </th>
                        <td>
                            {!! $contactForm->message !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.contactForm.fields.sport_name') }}
                        </th>
                        <td>
                            {{ $contactForm->sport_name->sport_name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.contact-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection