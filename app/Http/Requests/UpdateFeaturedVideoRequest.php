<?php

namespace App\Http\Requests;

use App\Models\FeaturedVideo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFeaturedVideoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('featured_video_edit');
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
