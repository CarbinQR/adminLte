<?php

namespace App\Actions\Web\Company;

use App\Models\Company;

final class ShowCompanyResponse
{
    private Company $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    public function getResponse(): Company
    {
        return $this->company;
    }
}
