<?php

namespace App\Http\Requests;

use App\Models\AddAchievement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddAchievementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_achievement_edit');
    }

    public function rules()
    {
        return [
            'player_image' => [
                'required',
            ],
            'player_name' => [
                'string',
                'required',
            ],
            'sport_name_id' => [
                'required',
                'integer',
            ],
            'age' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'medal_type' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'school_name' => [
                'string',
                'required',
            ],
            'class' => [
                'string',
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'certificate' => [
                'required',
            ],
            'slug' => [
                'string',
                'required',
            ],
        ];
    }
}
