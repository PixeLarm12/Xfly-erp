<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotifierUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'description' => ['sometimes', 'required', 'min:3', 'max:200'],
        ];
    }
}
