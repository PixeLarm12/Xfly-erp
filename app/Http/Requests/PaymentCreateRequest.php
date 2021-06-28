<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'description' => ['max: 200'],
            'buyer' => ['required', 'min: 3', 'max: 40'],
            'seller' => ['required', 'min: 3', 'max: 40'],
            'qtde' => ['required', 'integer'],
            'price' => ['required', 'min:3'],
            'purchase_date' => ['required', 'date'],
            'item' => ['required', 'min: 3', 'max: 40'],
        ];
    }
}
