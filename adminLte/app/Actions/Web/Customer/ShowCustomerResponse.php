<?php

namespace App\Actions\Web\Customer;

use App\Models\Customer;

final class ShowCustomerResponse
{
    private Customer $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getResponse(): Customer
    {
        return $this->customer;
    }
}
