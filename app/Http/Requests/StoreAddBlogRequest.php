<?php

namespace App\Http\Requests;

use App\Models\AddBlog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddBlogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_blog_create');
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
            'image' => [
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
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
