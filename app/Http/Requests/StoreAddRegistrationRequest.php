<?php

namespace App\Http\Requests;

use App\Models\AddRegistration;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_registration_create');
    }

    public function rules()
    {
        return [
            'school_name' => [
                'string',
                'required',
            ],
            'age' => [
                'string',
                'required',
            ],
            'sport_name_id' => [
                'required',
                'integer',
            ],
            'gender' => [
                'required',
            ],
        ];
    }
}