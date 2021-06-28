<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCreateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'seller' => ['required', 'min:2', 'max:40'],
            'price' => ['required', 'min: 3'],
            'delivery_date' => ['required', 'min: 10', 'max: 10'],
            'purchase_date' => ['required', 'min: 10', 'max: 10'],
            'service' => ['required', 'min: 5', 'max: 10'],
            'product_id' => ['required'],
            'company_id' => ['required'],
            'description' => ['max: 185'],
            'observation' => ['max: 185'],
        ];
    }
}
