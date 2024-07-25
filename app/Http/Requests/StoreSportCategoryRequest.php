<?php

namespace App\Http\Requests;

use App\Models\SportCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSportCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sport_category_create');
    }

    public function rules()
    {
        return [
            'sport_name' => [
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
