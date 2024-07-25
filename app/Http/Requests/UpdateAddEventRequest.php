<?php

namespace App\Http\Requests;

use App\Models\AddEvent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddEventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_event_edit');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'address' => [
                'required',
            ],
            'eventstart' => [
                'string',
                'required',
            ],
            'sport_name_id' => [
                'required',
                'integer',
            ],
            'schools.*' => [
                'integer',
            ],
            'schools' => [
                'required',
                'array',
            ],
            'slug' => [
                'string',
                'required',
            ],
        ];
    }
}
