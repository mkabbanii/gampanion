<?php

namespace App\Http\Requests;

use App\Models\Gampanion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGampanionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gampanion_edit');
    }

    public function rules()
    {
        return [
            'game_id'    => [
                'required',
                'integer',
            ],
            'user_id'    => [
                'required',
                'integer',
            ],
            'cost'       => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'level'      => [
                'string',
                'nullable',
            ],
            'server'     => [
                'string',
                'nullable',
            ],
            'platform'   => [
                'string',
                'nullable',
            ],
            'discount'   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'other_game' => [
                'string',
                'nullable',
            ],
        ];
    }
}
