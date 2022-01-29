<?php

namespace App\Actions\Api\Company;

final class FindCompaniesByCustomerIdRequest
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
