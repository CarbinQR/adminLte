<?php

namespace App\Actions\Web\Customer;

final class ShowCustomerRequest
{
    private int $customerId;

    public function __construct(int $customerId)
    {
        $this->customerId = $customerId;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }
}
