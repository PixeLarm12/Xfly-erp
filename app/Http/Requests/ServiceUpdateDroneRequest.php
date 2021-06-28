<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateDroneRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'seller' => ['sometimes', 'required', 'min:2', 'max:40'],
            'image' => ['sometimes', 'required', 'mimes:jpg,jpeg,png'],
            'price' => ['sometimes', 'required', 'min: 3'],
            'delivery_date' => ['sometimes', 'required', 'min: 10', 'max: 10'],
            'purchase_date' => ['sometimes', 'required', 'min: 10', 'max: 10'],
            'service' => ['sometimes', 'required', 'min: 5', 'max: 10'],
            'drone_id' => ['sometimes', 'required'],
            'company_id' => ['sometimes', 'required'],
            'description' => ['max: 185'],
            'observation' => ['max: 185'],
        ];
    }
}
