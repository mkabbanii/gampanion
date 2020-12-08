<?php

namespace App\Http\Requests;

use App\Models\Withdraw;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWithdrawRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('withdraw_edit');
    }

    public function rules()
    {
        return [
            'user_id'           => [
                'required',
                'integer',
            ],
            'points'            => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cash_amount'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'payment_method_id' => [
                'required',
                'integer',
            ],
            'note'              => [
                'string',
                'nullable',
            ],
            'status_id'         => [
                'required',
                'integer',
            ],
        ];
    }
}
