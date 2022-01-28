<?php

namespace App\Actions\Web\Company;

use App\Repositories\Company\CompanyRepositoryInterface;

final class GetCompaniesListAction
{
    private CompanyRepositoryInterface $companyRepositoryInterface;

    public function __construct(CompanyRepositoryInterface $companyRepositoryInterface)
    {
        $this->companyRepositoryInterface = $companyRepositoryInterface;
    }

    public function execute(): GetCompaniesListResponse
    {
        $companyList = $this->companyRepositoryInterface->getAll();

        return new GetCompaniesListResponse($companyList);
    }
}
