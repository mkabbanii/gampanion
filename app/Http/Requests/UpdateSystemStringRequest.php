<?php

namespace App\Http\Requests;

use App\Models\SystemString;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSystemStringRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('system_string_edit');
    }

    public function rules()
    {
        return [
            'key'   => [
                'string',
                'nullable',
            ],
            'value' => [
                'string',
                'nullable',
            ],
        ];
    }
}
