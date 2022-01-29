<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateCompanyValidationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exist:companies,id',
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|unique|string|min:3|max:255',
            'address' => 'required|email|min:3|max:255',
            'customersIdsArray' => 'array|nullable',
        ];
    }
}
