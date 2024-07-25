<?php

namespace App\Http\Requests;

use App\Models\AddContestant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddContestantRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_contestant_edit');
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
