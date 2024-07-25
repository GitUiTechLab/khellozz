@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.addFaq.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-faqs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.addFaq.fields.id') }}
                        </th>
                        <td>
                            {{ $addFaq->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addFaq.fields.question') }}
                        </th>
                        <td>
                            {{ $addFaq->question }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.addFaq.fields.answer') }}
                        </th>
                        <td>
                            {{ $addFaq->answer }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.add-faqs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection