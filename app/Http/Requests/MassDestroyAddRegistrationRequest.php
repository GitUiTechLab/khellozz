<?php

namespace App\Http\Requests;

use App\Models\AddRegistration;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAddRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('add_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:add_registrations,id',
        ];
    }
}
