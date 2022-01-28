<?php

namespace App\Actions\Web\Company;

use App\Repositories\Company\CompanyRepositoryInterface;

final class UpdateCompanyAction
{
    private CompanyRepositoryInterface $companyRepositoryInterface;

    public function __construct(CompanyRepositoryInterface $companyRepositoryInterface)
    {
        $this->companyRepositoryInterface = $companyRepositoryInterface;
    }

    public function execute(UpdateCompanyRequest $request): UpdateCompanyResponse
    {
        $company = $this->companyRepositoryInterface->findById($request->getCompanyId());

        $company->name = $request->getCompanyName();
        $company->email = $request->getCompanyEmail();
        $company->address = $request->getCompanyAddress();

        return new UpdateCompanyResponse(
            $company = $this->companyRepositoryInterface->update($company)
        );
    }
}
