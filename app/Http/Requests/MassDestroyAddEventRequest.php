<?php

namespace App\Http\Requests;

use App\Models\AddEvent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAddEventRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('add_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:add_events,id',
        ];
    }
}
