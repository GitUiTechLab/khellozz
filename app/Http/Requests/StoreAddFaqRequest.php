<?php

namespace App\Http\Requests;

use App\Models\AddFaq;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddFaqRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_faq_create');
    }

    public function rules()
    {
        return [
            'question' => [
                'required',
            ],
            'answer' => [
                'required',
            ],
        ];
    }
}
