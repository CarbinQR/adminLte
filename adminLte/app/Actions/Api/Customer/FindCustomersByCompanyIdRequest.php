<?php

namespace App\Actions\Api\Customer;

final class FindCustomersByCompanyIdRequest
{
    private int $companyId;

    public function __construct(int $companyId)
    {
        $this->companyId = $companyId;
    }

    public function getCompanyId(): int
    {
        return $this->companyId;
    }
}
