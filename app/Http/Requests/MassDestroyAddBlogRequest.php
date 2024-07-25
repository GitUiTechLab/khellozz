<?php

namespace App\Http\Requests;

use App\Models\AddBlog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAddBlogRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('add_blog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:add_blogs,id',
        ];
    }
}
