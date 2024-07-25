<?php

namespace App\Http\Requests;

use App\Models\AddFaq;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAddFaqRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('add_faq_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:add_faqs,id',
        ];
    }
}
