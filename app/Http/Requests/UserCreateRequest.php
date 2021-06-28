<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:45'],
            'email' => ['required', 'email', 'min:10', 'max:45', 'unique:users'],
            'financial' => ['required'],
            'password' => ['required', 'min:6', 'max:45'],
        ];
    }

    public function data()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'financial' => $this->financial,
        ];
    }
}
