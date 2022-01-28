<?php

namespace App\Actions\Web\Customer;

final class UpdateCustomerRequest
{
    private int $customerId;

    private string $customerName;

    private string $customerSurname;

    private string $customerEmail;

    private string $customerPhoneNumber;

    public function __construct(
        int $customerId,
        string $customerName,
        string $customerSurname,
        string $customerEmail,
        string $customerPhoneNumber
    ) {
        $this->customerId = $customerId;
        $this->customerName = $customerName;
        $this->customerSurname = $customerSurname;
        $this->customerEmail = $customerEmail;
        $this->customerPhoneNumber = $customerPhoneNumber;
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

    public function getCustomerId(): int
    {
        return $this->customerId;
    }
}
