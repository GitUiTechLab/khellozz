<?php

namespace App\Http\Requests;

use App\Models\ContactForm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContactFormRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_form_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'message' => [
                'required',
            ],
        ];
    }
}
