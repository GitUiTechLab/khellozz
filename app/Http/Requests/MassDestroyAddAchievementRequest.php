<?php

namespace App\Http\Requests;

use App\Models\AddAchievement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAddAchievementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('add_achievement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:add_achievements,id',
        ];
    }
}
