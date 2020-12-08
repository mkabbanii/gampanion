<?php

namespace App\Http\Requests;

use App\Models\Redemption;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRedemptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('redemption_edit');
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
