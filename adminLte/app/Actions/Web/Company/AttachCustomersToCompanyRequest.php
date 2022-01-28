<?php

namespace App\Actions\Web\Company;

final class AttachCustomersToCompanyRequest
{
    private int $companyId;

    private ?array $customersIdsArray;

    public function __construct(
        int $companyId,
        ?array $customersIdsArray
    ) {
        $this->companyId = $companyId;
        $this->customersIdsArray = $customersIdsArray;
    }

    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    public function getCustomersIdsArray(): ?array
    {
        return $this->customersIdsArray;
    }
}
