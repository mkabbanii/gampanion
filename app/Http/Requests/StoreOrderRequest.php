<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_create');
    }

    public function rules()
    {
        return [
            'user_id'                   => [
                'required',
                'integer',
            ],
            'status_id'                 => [
                'required',
                'integer',
            ],
            'amount_deducted_from_user' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'amount_earned_by_provider' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'note'                      => [
                'string',
                'nullable',
            ],
            'gampanion_id'              => [
                'required',
                'integer',
            ],
            'quantity'                  => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'approved_at'               => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'rejected_at'               => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'proposed_time'             => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'request_note'              => [
                'string',
                'nullable',
            ],
        ];
    }
}
