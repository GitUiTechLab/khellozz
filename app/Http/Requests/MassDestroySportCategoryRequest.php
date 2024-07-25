<?php

namespace App\Http\Requests;

use App\Models\SportCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySportCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sport_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sport_categories,id',
        ];
    }
}
