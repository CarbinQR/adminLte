<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

final class AttachCustomersToCompanyValidationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exist:companies,id',
            'customersIdsArray' => 'array|nullable',
        ];
    }
}
