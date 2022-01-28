<?php

namespace App\Actions\Web\Customer;

use App\Models\Customer;

final class UpdateCustomerResponse
{
    private Customer $updatedCustomer;

    public function __construct(Customer $updatedCustomer)
    {
        $this->updatedCustomer = $updatedCustomer;
    }

    public function getResponse(): Customer
    {
        return $this->updatedCustomer;
    }
}
