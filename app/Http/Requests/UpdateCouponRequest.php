<?php

namespace App\Http\Requests;

use App\Models\Coupon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCouponRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('coupon_edit');
    }

    public function rules()
    {
        return [
            'code'     => [
                'string',
                'max:6',
                'required',
            ],
            'points'   => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'end_date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'quantity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'note'     => [
                'string',
                'nullable',
            ],
        ];
    }
}
