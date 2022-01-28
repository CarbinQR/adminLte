<?php

namespace App\Actions\Web\Customer;

final class DetachCustomerRequest
{
    private int $customerId;

    private int $companyId;

    public function __construct(
        int $customerId,
        int $companyId,
    ) {
        $this->customerId = $customerId;
        $this->companyId = $companyId;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function getCompanyId(): int
    {
        return $this->companyId;
    }
}
