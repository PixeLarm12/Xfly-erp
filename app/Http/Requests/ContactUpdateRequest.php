<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['sometimes', 'required'],
            'department' => ['sometimes', 'required', 'min:2', 'max:15'],
            'email' => ['required', 'email', 'min:10', 'max:40'],
            'name' => ['sometimes', 'required', 'min:3', 'max:40'],
            'number' => ['sometimes', 'required'],
        ];
    }
}
