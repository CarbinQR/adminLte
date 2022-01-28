<?php

namespace App\Actions\Web\Customer;

use App\Models\Customer;
use App\Repositories\Customer\CustomerRepositoryInterface;

final class StoreCustomerAction
{
    private CustomerRepositoryInterface $customerRepositoryInterface;

    public function __construct(CustomerRepositoryInterface $customerRepositoryInterface)
    {
        $this->customerRepositoryInterface = $customerRepositoryInterface;
    }

    public function execute(StoreCustomerRequest $request): StoreCustomerResponse
    {
        $customer = new Customer();

        $customer->name = $request->getCustomerName();
        $customer->surname = $request->getCustomerSurname();
        $customer->email = $request->getCustomerEmail();
        $customer->phone_number = $request->getCustomerPhoneNumber();

        $customer = $this->customerRepositoryInterface->store($customer);

        if($request->getCompaniesIdsArray()) {
            $companiesIdsArray = [];

            foreach ($request->getCompaniesIdsArray() as $companyId){
                $companiesIdsArray[] = (int) $companyId;
            }

            $customer->companies()->attach($companiesIdsArray);
        }

        return new StoreCustomerResponse($customer);
    }
}
