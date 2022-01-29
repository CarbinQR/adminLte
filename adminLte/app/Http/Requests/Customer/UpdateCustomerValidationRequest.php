<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateCustomerValidationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:customers,id',
            'name' => 'required|string|min:3|max:255',
            'surname' => 'required|string|min:2|max:255',
            'email' => 'required|string|min:3|max:255',
            'phone_number' => 'required|string|min:10|max:255',
        ];
    }
}
