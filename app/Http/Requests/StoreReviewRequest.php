<?php

namespace App\Http\Requests;

use App\Models\Review;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReviewRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('review_create');
    }

    public function rules()
    {
        return [
            'user_id'         => [
                'required',
                'integer',
            ],
            'comment'         => [
                'string',
                'nullable',
            ],
            'user_rate_value' => [
                'numeric',
                'min:1',
                'max:5',
            ],
            'is_recommend'    => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'gampanion_id'    => [
                'required',
                'integer',
            ],
        ];
    }
}
