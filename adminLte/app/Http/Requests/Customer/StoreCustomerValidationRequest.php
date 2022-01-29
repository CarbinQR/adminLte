<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

final class StoreCustomerValidationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:255',
            'surname' => 'required|string|min:2|max:255',
            'email' => 'required|unique:customers|string|min:3|max:255',
            'phone_number' => 'required|string|min:10|max:255',
            'companiesIdArray' => 'array|nullable',
        ];
    }
}
