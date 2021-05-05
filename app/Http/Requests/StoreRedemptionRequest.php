<?php

namespace App\Http\Requests;

use App\Models\Redemption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRedemptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('redemption_create');
    }

    public function rules()
    {
        return [
            'coupon_id' => [
                'required',
                'integer',
            ],
            'user_id'   => [
                'required',
                'integer',
            ],
        ];
    }
}
