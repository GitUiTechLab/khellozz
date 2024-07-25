<?php

namespace App\Http\Requests;

use App\Models\AddReview;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddReviewRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_review_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'review' => [
                'required',
            ],
            'image' => [
                'required',
            ],
            'reviewer_name' => [
                'string',
                'required',
            ],
            'address' => [
                'required',
            ],
        ];
    }
}
