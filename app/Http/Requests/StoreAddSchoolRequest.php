<?php

namespace App\Http\Requests;

use App\Models\AddSchool;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddSchoolRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_school_create');
    }

    public function rules()
    {
        return [
            'school_name' => [
                'string',
                'required',
            ],
            'slug' => [
                'string',
                'required',
            ],
        ];
    }
}
