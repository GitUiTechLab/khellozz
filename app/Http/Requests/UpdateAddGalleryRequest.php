<?php

namespace App\Http\Requests;

use App\Models\AddGallery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddGalleryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_gallery_edit');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
            'slug' => [
                'string',
                'required',
            ],
        ];
    }
}
