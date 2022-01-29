<?php

namespace App\Actions\Api\Company;

use App\Repositories\Company\CompanyRepositoryInterface;

final class FindCompaniesByCustomerIdAction
{
    private CompanyRepositoryInterface $companyRepositoryInterface;

    public function __construct(CompanyRepositoryInterface $companyRepositoryInterface)
    {
        $this->companyRepositoryInterface = $companyRepositoryInterface;
    }

    public function execute(FindCompaniesByCustomerIdRequest $request): FindCompaniesByCustomerIdResponse
    {
        return new FindCompaniesByCustomerIdResponse(
            $this->companyRepositoryInterface->findCompaniesByCustomerId($request->getCustomerId())
        );
    }
}
