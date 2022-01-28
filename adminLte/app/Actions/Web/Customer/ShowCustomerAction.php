<?php

namespace App\Actions\Web\Customer;

use App\Repositories\Customer\CustomerRepositoryInterface;

final class ShowCustomerAction
{
    private CustomerRepositoryInterface $customerRepositoryInterface;

    public function __construct(CustomerRepositoryInterface $customerRepositoryInterface)
    {
        $this->customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(ShowCustomerRequest $request): ShowCustomerResponse
    {
        return new ShowCustomerResponse(
            $this->customerRepositoryInterface->findById($request->getCustomerId())
        );
    }
}
