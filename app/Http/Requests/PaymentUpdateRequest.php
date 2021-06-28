<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'description' => ['max: 200'],
            'buyer' => ['sometimes', 'required', 'min: 3', 'max: 40'],
            'seller' => ['sometimes', 'required', 'min: 3', 'max: 40'],
            'qtde' => ['sometimes', 'required', 'integer'],
            'price' => ['sometimes', 'required', 'min:3'],
            'purchase_date' => ['sometimes', 'required', 'date'],
            'item' => ['sometimes', 'required', 'min: 3', 'max: 40'],
        ];
    }
}
