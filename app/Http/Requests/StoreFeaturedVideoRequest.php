<?php

namespace App\Http\Requests;

use App\Models\FeaturedVideo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFeaturedVideoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('featured_video_create');
    }

    public function rules()
    {
        return [
            'video' => [
                'required',
            ],
        ];
    }
}
