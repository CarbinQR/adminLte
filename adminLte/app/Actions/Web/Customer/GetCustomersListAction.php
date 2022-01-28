<?php

namespace App\Actions\Web\Customer;

use App\Repositories\Customer\CustomerRepositoryInterface;

final class GetCustomersListAction
{
    private CustomerRepositoryInterface $customerRepositoryInterface;

    public function __construct(CustomerRepositoryInterface $customerRepositoryInterface)
    {
        $this->customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(): GetCustomersListResponse
    {
        $customersList = $this->customerRepositoryInterface->getAll();

        return new GetCustomersListResponse($customersList);
    }
}
