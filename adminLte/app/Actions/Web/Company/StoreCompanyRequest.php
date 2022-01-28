<?php

namespace App\Actions\Web\Company;

final class StoreCompanyRequest
{
    private string $companyName;

    private string $companyEmail;

    private string $companyAddress;

    private ?array $customersIdsArray;

    public function __construct(
        string $companyName,
        string $companyEmail,
        string $companyAddress,
        ?array $customersIdsArray
    ) {
        $this->companyName = $companyName;
        $this->companyEmail = $companyEmail;
        $this->companyAddress = $companyAddress;
        $this->customersIdsArray = $customersIdsArray;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function getCompanyEmail(): string
    {
        return $this->companyEmail;
    }

    public function getCompanyAddress(): string
    {
        return $this->companyAddress;
    }

    public function getCustomersIdsArray(): ?array
    {
        return $this->customersIdsArray;
    }
}
