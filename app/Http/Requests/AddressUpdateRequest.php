<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['sometimes', 'required'],
            'street' => ['sometimes', 'required', 'min:2', 'max:40'],
            'complement' => ['sometimes', 'required', 'min:3', 'max:40'],
            'zipcode' => ['sometimes', 'required'],
            'city' => ['sometimes', 'required', 'min:3', 'max:40'],
            'state' => ['sometimes', 'required', 'min:2', 'max:40'],
            'country' => ['sometimes', 'required', 'min:3', 'max:40'],
        ];
    }
}
