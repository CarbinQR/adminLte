<?php

namespace App\Actions\Web\Company;

use App\Repositories\Company\CompanyRepositoryInterface;

final class DestroyCompanyAction
{
    private CompanyRepositoryInterface $companyRepositoryInterface;

    public function __construct(CompanyRepositoryInterface $companyRepositoryInterface)
    {
        $this->companyRepositoryInterface = $companyRepositoryInterface;
    }

    public function execute(DestroyCompanyRequest $request): void
    {
        $company = $this->companyRepositoryInterface->findById($request->getCompanyId());

        $this->companyRepositoryInterface->destroy($company);
    }
}
