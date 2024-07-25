<?php

namespace App\Http\Requests;

use App\Models\AddPlayer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddPlayerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_player_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'class' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'age' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'father_mother_name' => [
                'string',
                'required',
            ],
            'upload_photo' => [
                'required',
            ],
            'registration_id' => [
                'required',
                'integer',
            ],
            'event_title_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
