<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

final class StoreCustomerValidationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:255',
            'surname' => 'required|string|min:2|max:255',
            'email' => 'required|unique|string|min:3|max:255',
            'phone_number' => 'required|email|min:3|max:20',
            'companiesIdArray' => 'array|nullable',
        ];
    }
}
