<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AmbulanceStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'car_number' => 'required',
            'car_model' =>'required',
            'car_year_made' =>'required|numeric',
            'car_type' => "required|in:1,2",
            'driver_name' => 'required',
            'driver_license_number' =>'required|numeric',
            'driver_phone' =>'required|numeric',
        ];
    }
}
