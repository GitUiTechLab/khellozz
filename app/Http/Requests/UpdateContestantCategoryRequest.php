<?php

namespace App\Http\Requests;

use App\Models\ContestantCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContestantCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contestant_category_edit');
    }

    public function rules()
    {
        return [
            'category_name' => [
                'string',
                'required',
            ],
            'category_image' => [
                'required',
            ],
            'slug' => [
                'string',
                'required',
            ],
        ];
    }
}
