<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

final class DetachCustomersToCompanyValidationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'customerId' => 'required|integer|exists:customers,id',
            'companyId' => 'required|integer|exists:companies,id',
        ];
    }
}
