<?php

namespace App\Actions\Web\Customer;

use App\Repositories\Customer\CustomerRepositoryInterface;

final class DestroyCustomerAction
{
    private CustomerRepositoryInterface $customerRepositoryInterface;

    public function __construct(CustomerRepositoryInterface $customerRepositoryInterface)
    {
        $this->customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(DestroyCustomerRequest $request): void
    {
        $company = $this->customerRepositoryInterface->findById($request->getCustomerId());

        $this->customerRepositoryInterface->destroy($company);
    }
}
