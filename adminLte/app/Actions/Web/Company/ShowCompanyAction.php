<?php

namespace App\Actions\Web\Company;

use App\Repositories\Company\CompanyRepositoryInterface;

final class ShowCompanyAction
{
    private CompanyRepositoryInterface $companyRepositoryInterface;

    public function __construct(CompanyRepositoryInterface $companyRepositoryInterface)
    {
        $this->companyRepositoryInterface = $companyRepositoryInterface;
    }

    public function execute(ShowCompanyRequest $request): ShowCompanyResponse
    {
        return new ShowCompanyResponse(
            $this->companyRepositoryInterface->findById($request->getCompanyId())
        );
    }
}
