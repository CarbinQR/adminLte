<?php

namespace App\Actions\Web\Customer;

use App\Repositories\Customer\CustomerRepositoryInterface;

final class DetachCustomerAction
{
    private CustomerRepositoryInterface $customerRepositoryInterface;

    public function __construct(CustomerRepositoryInterface $customerRepositoryInterface)
    {
        $this->customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(DetachCustomerRequest $request): void
    {
        $customer = $this->customerRepositoryInterface->findById($request->getCustomerId());

        $companiesIdsArr = [$request->getCompanyId()];

        $this->customerRepositoryInterface->detach($customer, $companiesIdsArr);
    }
}
