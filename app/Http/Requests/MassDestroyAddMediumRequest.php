<?php

namespace App\Http\Requests;

use App\Models\AddMedium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAddMediumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('add_medium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:add_media,id',
        ];
    }
}
