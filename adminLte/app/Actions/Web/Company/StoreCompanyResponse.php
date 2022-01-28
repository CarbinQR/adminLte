<?php

namespace App\Actions\Web\Company;

use App\Models\Company;

final class StoreCompanyResponse
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
