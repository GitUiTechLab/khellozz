<?php

namespace App\Http\Requests;

use App\Models\AddContestant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAddContestantRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('add_contestant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:add_contestants,id',
        ];
    }
}
