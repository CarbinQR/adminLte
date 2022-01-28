<?php

namespace App\Actions\Web\Customer;

final class StoreCustomerRequest
{
    private string $customerName;

    private string $customerSurname;

    private string $customerEmail;

    private string $customerPhoneNumber;

    private ?array $companiesIdArray;

    public function __construct(
        string $customerName,
        string $customerSurname,
        string $customerEmail,
        string $customerPhoneNumber,
        ?array $companiesIdArray = null
    ) {
        $this->customerName = $customerName;
        $this->customerSurname = $customerSurname;
        $this->customerEmail = $customerEmail;
        $this->customerPhoneNumber = $customerPhoneNumber;
        $this->companiesIdArray = $companiesIdArray;
    }

    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    public function getCustomerSurname(): string
    {
        return $this->customerSurname;
    }

    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    public function getCustomerPhoneNumber(): string
    {
        return $this->customerPhoneNumber;
    }

    public function getCompaniesIdsArray(): ?array
    {
        return $this->companiesIdArray;
    }
}
