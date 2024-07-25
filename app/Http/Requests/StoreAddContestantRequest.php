<?php

namespace App\Http\Requests;

use App\Models\AddContestant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddContestantRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_contestant_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'slug' => [
                'string',
                'required',
            ],
        ];
    }
}
