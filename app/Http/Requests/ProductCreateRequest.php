<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'model' => ['required', 'min:3', 'max:50'],
            'company_id' => ['required'],
            'price' => ['required', 'min:3'],
            'description' => ['max:255'],
        ];
    }
}
