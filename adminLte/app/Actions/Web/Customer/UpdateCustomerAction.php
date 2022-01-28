<?php

namespace App\Actions\Web\Customer;

use App\Repositories\Customer\CustomerRepositoryInterface;

final class UpdateCustomerAction
{
    private CustomerRepositoryInterface $customerRepositoryInterface;

    public function __construct(CustomerRepositoryInterface $customerRepositoryInterface)
    {
        $this->customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(UpdateCustomerRequest $request): UpdateCustomerResponse
    {
        $customer = $this->customerRepositoryInterface->findById($request->getCustomerId());

        $customer->name = $request->getCustomerName();
        $customer->surname = $request->getCustomerSurname();
        $customer->email = $request->getCustomerEmail();
        $customer->phone_number = $request->getCustomerPhoneNumber();

        return new UpdateCustomerResponse(
            $this->customerRepositoryInterface->update($customer)
        );
    }
}
