<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DroneUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'model' => ['sometimes', 'required'],
            'description' => ['max:200'],
            'status' => ['sometimes', 'required'],
            'production_date' => ['sometimes', 'required', 'min:10'],
            'purchase_date' => ['sometimes', 'required', 'min:10'],
            'company_id' => ['sometimes', 'required'],
        ];
    }
}
