<?php

namespace App\Actions\Web\Company;

use App\Models\Company;
use App\Repositories\Company\CompanyRepositoryInterface;

final class StoreCompanyAction
{
    private CompanyRepositoryInterface $companyRepositoryInterface;

    public function __construct(CompanyRepositoryInterface $companyRepositoryInterface)
    {
        $this->companyRepositoryInterface = $companyRepositoryInterface;
    }

    public function execute(StoreCompanyRequest $request): StoreCompanyResponse
    {
        $company = new Company();

        $company->name = $request->getCompanyName();
        $company->email = $request->getCompanyEmail();
        $company->address = $request->getCompanyAddress();

        $company = $this->companyRepositoryInterface->store($company);

        if($request->getCustomersIdsArray()) {
            $customersIdsArray = [];

            foreach ($request->getCustomersIdsArray() as $customerId){
                $customersIdsArray[] = (int) $customerId;
            }

            $company->customers()->attach($customersIdsArray);
        }

        return new StoreCompanyResponse($company);
    }
}
