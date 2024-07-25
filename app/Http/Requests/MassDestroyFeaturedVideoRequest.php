<?php

namespace App\Http\Requests;

use App\Models\FeaturedVideo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFeaturedVideoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('featured_video_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:featured_videos,id',
        ];
    }
}
