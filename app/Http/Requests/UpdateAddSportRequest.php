<?php

namespace App\Http\Requests;

use App\Models\AddSport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddSportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_sport_edit');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'sport_name_id' => [
                'required',
                'integer',
            ],
            'slug' => [
                'string',
                'required',
            ],
        ];
    }
}
