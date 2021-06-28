<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'company_id' => ['required'],
            'street' => ['required', 'min:2', 'max:40'],
            'complement' => ['min:3', 'max:40'],
            'zipcode' => ['required'],
            'city' => ['required', 'min:3', 'max:40'],
            'state' => ['required', 'min:3', 'max:40'],
            'country' => ['required', 'min:3', 'max:40'],
        ];
    }
}
