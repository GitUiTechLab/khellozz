<?php

namespace App\Http\Requests;

use App\Models\AddMedium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddMediumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_medium_create');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
