@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addRegistration.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-registrations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addRegistration.fields.id') }}
                        </th>
                        <td>
                            {{ $addRegistration->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addRegistration.fields.school_name') }}
                        </th>
                        <td>
                            {{ $addRegistration->school_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addRegistration.fields.age') }}
                        </th>
                        <td>
                            {{ $addRegistration->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addRegistration.fields.sport_name') }}
                        </th>
                        <td>
                            {{ $addRegistration->sport_name->sport_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addRegistration.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\AddRegistration::GENDER_RADIO[$addRegistration->gender] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-registrations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection