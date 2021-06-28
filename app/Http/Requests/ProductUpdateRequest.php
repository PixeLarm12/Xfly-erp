<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'model' => ['sometimes', 'required', 'min:3', 'max:50'],
            'company_id' => ['sometimes', 'required'],
            'price' => ['sometimes', 'required', 'min:3'],
            'description' => ['max:255'],
        ];
    }
}
