<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'min:3', 'max:40'],
            'real_name' => ['sometimes', 'required', 'min:3', 'max:40'],
            'cnpj' => ['max:18'],
            'email' => ['sometimes', 'required', 'email', 'min:10', 'max:40', Rule::unique('companies')->ignore($this->route()->company->id)],
            'avatar' => ['mimes:jpg,jpeg,png'],
            'owner' => ['sometimes', 'required', 'min:3', 'max:50'],
            'municipal_registration' => ['max:22'],
            'state_registration' => ['max:22'],
        ];
    }
}
