<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:40'],
            'real_name' => ['required', 'min:3', 'max:40'],
            'cnpj' => ['max:18'],
            'email' => ['required', 'email', 'min:10', 'max:40', 'unique:companies'],
            'owner' => ['required', 'min:3', 'max:50'],
            'municipal_registration' => ['max:22'],
            'state_registration' => ['max:22'],

            'contacts.*.department' => ['required', 'min:2', 'max:15'],
            'contacts.*.email' => ['required', 'email', 'min:10', 'max:40'],
            'contacts.*.name' => ['required', 'min:3', 'max:40'],
            'contacts.*.number' => ['required'],

            'addresses.*.street' => ['required', 'min:2', 'max:40'],
            'addresses.*.complement' => ['required', 'min:3', 'max:40'],
            'addresses.*.zipcode' => ['required'],
            'addresses.*.city' => ['required', 'min:3', 'max:40'],
            'addresses.*.state' => ['required', 'min:2', 'max:40'],
            'addresses.*.country' => ['required', 'min:3', 'max:40'],
        ];
    }

    public function getContactsData()
    {
        return $this->input('contacts', []);
    }

    public function getAddressesData()
    {
        return $this->input('addresses', []);
    }

    // public function getContactsData() : array
    // {
    //     return json_decode($this->input('contacts', []), true);
    // }

    // public function getAddressesData() : array
    // {
    //     return json_decode($this->input('addresses', []), true);
    // }
}
