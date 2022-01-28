<?php

namespace App\Actions\Web\Company;

use App\Repositories\Company\CompanyRepositoryInterface;

final class AttachCustomersToCompanyAction
{
    private CompanyRepositoryInterface $companyRepositoryInterface;

    public function __construct(CompanyRepositoryInterface $companyRepositoryInterface)
    {
        $this->companyRepositoryInterface = $companyRepositoryInterface;
    }

    public function execute(AttachCustomersToCompanyRequest $request): void
    {
        $company = $this->companyRepositoryInterface->findById($request->getCompanyId());

        $customers = $company->customers;

        $customersIdsArray = [];

        foreach ($customers as $customer) {
            $customersIdsArray[] = $customer->id;
        }

        foreach ($request->getCustomersIdsArray() as $customerId) {
            $customersIdsArray[] = $customerId;
        }

        $company->customers()->sync($customersIdsArray);
    }
}
