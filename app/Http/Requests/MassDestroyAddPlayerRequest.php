<?php

namespace App\Http\Requests;

use App\Models\AddPlayer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAddPlayerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('add_player_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:add_players,id',
        ];
    }
}
