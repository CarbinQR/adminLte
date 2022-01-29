<?php

namespace App\Actions\Api\Customer;

use App\Repositories\Customer\CustomerRepositoryInterface;

final class FindCustomersByCompanyIdAction
{
    private CustomerRepositoryInterface $customerRepositoryInterface;

    public function __construct(CustomerRepositoryInterface $customerRepositoryInterface)
    {
        $this->customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(FindCustomersByCompanyIdRequest $request): FindCustomersByCompanyIdResponse
    {
        return new FindCustomersByCompanyIdResponse(
            $this->customerRepositoryInterface->findCustomersByCompanyId($request->getCompanyId())
        );
    }
}
