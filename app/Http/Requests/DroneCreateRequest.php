<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DroneCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'model' => ['required'],
            'description' => ['max:200'],
            'production_date' => ['required', 'min:10'],
            'purchase_date' => ['required', 'min:10'],
            'company_id' => ['required'],
        ];
    }

    public function returnData()
    {
        return [
            'model' => $this->model,
            'description' => $this->description,
            'production_date' => $this->production_date,
            'purchase_date' => $this->purchase_date,
            'company_id' => $this->company_id,
            'status' => 'Liberado',
        ];
    }
}
