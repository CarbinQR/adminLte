<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

final class StoreCompanyValidationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|unique:companies|string|min:3|max:255',
            'address' => 'required|string|min:3|max:255',
            'customersIdsArray' => 'array|nullable',
        ];
    }
}
