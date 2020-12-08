<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name'                => [
                'string',
                'required',
            ],
            'username'            => [
                'string',
                'required',
            ],
            'email'               => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'birth_day'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'phone'               => [
                'string',
                'nullable',
            ],
            'about'               => [
                'string',
                'nullable',
            ],
            'is_active'           => [
                'required',
            ],
            'roles.*'             => [
                'integer',
            ],
            'roles'               => [
                'required',
                'array',
            ],
            'is_blocked'          => [
                'required',
            ],
            'is_provider'         => [
                'required',
            ],
            'phone_verified_at'   => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'address'             => [
                'string',
                'nullable',
            ],
            'gps_location'        => [
                'string',
                'nullable',
            ],
            'language'            => [
                'string',
                'nullable',
            ],
            'rank'                => [
                'string',
                'nullable',
            ],
            'nationality'         => [
                'string',
                'nullable',
            ],
            'passport_number'     => [
                'string',
                'nullable',
            ],
            'bank_name'           => [
                'string',
                'nullable',
            ],
            'bank_account_number' => [
                'string',
                'nullable',
            ],
            'beneficial_name'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
