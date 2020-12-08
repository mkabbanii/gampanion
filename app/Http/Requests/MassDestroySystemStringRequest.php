<?php

namespace App\Http\Requests;

use App\Models\SystemString;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySystemStringRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('system_string_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:system_strings,id',
        ];
    }
}
