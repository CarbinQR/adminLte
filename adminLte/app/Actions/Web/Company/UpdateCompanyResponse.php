<?php

namespace App\Actions\Web\Company;

use App\Models\Company;

final class UpdateCompanyResponse
{
    private Company $updatedCompany;

    public function __construct(Company $updatedCompany)
    {
        $this->updatedCompany = $updatedCompany;
    }

    public function getResponse(): Company
    {
        return $this->updatedCompany;
    }
}
