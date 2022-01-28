<?php

namespace App\Actions\Web\Customer;

use App\Repositories\Customer\CustomerRepositoryInterface;

final class ShowCustomerWithCompaniesAction
{
    private CustomerRepositoryInterface $customerRepositoryInterface;

    public function __construct(CustomerRepositoryInterface $customerRepositoryInterface)
    {
        $this->customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(ShowCustomerWithCompaniesRequest $request): ShowCustomerWithCompaniesResponse
    {
        return new ShowCustomerWithCompaniesResponse(
            $this->customerRepositoryInterface->findByIdWithCompanies($request->getCustomerId())
        );
    }
}
