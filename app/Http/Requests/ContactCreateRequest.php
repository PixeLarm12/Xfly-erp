<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'company_id' => ['required'],
            'department' => ['required', 'min:2', 'max:15'],
            'email' => ['required', 'email', 'min:10', 'max:40'],
            'name' => ['required', 'min:3', 'max:40'],
            'number' => ['required'],
        ];
    }
}
