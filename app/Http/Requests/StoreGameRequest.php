<?php

namespace App\Http\Requests;

use App\Models\Game;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGameRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('game_create');
    }

    public function rules()
    {
        return [
            'game_name'   => [
                'string',
                'required',
            ],
            'game_info'   => [
                'string',
                'required',
            ],
            'note'        => [
                'string',
                'nullable',
            ],
            'is_featured' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
