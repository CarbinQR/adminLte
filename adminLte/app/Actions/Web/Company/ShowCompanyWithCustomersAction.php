<?php

namespace App\Actions\Web\Company;

use App\Repositories\Company\CompanyRepositoryInterface;

final class ShowCompanyWithCustomersAction
{
    private CompanyRepositoryInterface $companyRepositoryInterface;

    public function __construct(CompanyRepositoryInterface $companyRepositoryInterface)
    {
        $this->companyRepositoryInterface = $companyRepositoryInterface;
    }

    public function execute(ShowCompanyWithCustomersRequest $request): ShowCompanyWithCustomersResponse
    {
        return new ShowCompanyWithCustomersResponse(
            $this->companyRepositoryInterface->findByIdWithCustomers($request->getCompanyId())
        );
    }
}
