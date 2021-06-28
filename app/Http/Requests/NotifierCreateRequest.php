<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotifierCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'description' => ['required', 'min:3', 'max:200'],
        ];
    }

    public function data(): array
    {
        return [
            'description' => $this->description,
            'drone_id' => $this->drone_id,
            'product_id' => $this->product_id,
            'company_id' => $this->company_id,
        ];
    }
}
