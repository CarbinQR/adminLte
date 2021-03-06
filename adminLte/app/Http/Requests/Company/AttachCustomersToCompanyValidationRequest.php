<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

final class AttachCustomersToCompanyValidationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:companies,id',
            'customersIdsArray' => 'array|required',
        ];
    }
}
