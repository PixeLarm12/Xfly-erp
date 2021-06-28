<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'min:3', 'max:45'],
            'email' => ['sometimes', 'required', 'email', 'min:10', 'max:45', Rule::unique('users')->ignore($this->route()->user->id)],
            'financial' => ['sometimes', 'required', 'integer'],
        ];
    }
}
