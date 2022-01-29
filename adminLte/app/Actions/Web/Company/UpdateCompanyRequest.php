<?php

namespace App\Actions\Web\Company;

final class UpdateCompanyRequest
{
    private int $companyId;

    private string $companyName;

    private string $companyEmail;

    private string $companyAddress;

    public function __construct(
        int $companyId,
        string $companyName,
        string $companyEmail,
        string $companyAddress,
    ) {
        $this->companyId = $companyId;
        $this->companyName = $companyName;
        $this->companyEmail = $companyEmail;
        $this->companyAddress = $companyAddress;
    }

    public function getCompanyId(): int
    {
        return $this->companyId;
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
}
