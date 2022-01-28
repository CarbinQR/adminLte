<?php

namespace App\Actions\Web\Company;

final class ShowCompanyWithCustomersRequest
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
