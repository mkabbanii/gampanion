<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_create');
    }

    public function rules()
    {
        return [
            'user_id'            => [
                'required',
                'integer',
            ],
            'transaction_amount' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'earned_points'      => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status_id'          => [
                'required',
                'integer',
            ],
            'note'               => [
                'string',
                'nullable',
            ],
        ];
    }
}
