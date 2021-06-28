<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
            'remember_token' => ['sometimes', 'boolean'],
        ];
    }

    public function getRemember()
    {
        return $this->input('remember_token', false);
    }
}
