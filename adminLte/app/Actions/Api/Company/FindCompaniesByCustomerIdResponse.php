<?php

namespace App\Actions\Api\Company;

use Illuminate\Pagination\LengthAwarePaginator;

final class FindCompaniesByCustomerIdResponse
{
    private LengthAwarePaginator $companies;

    public function __construct(LengthAwarePaginator $companies)
    {
        $this->companies = $companies;
    }

    public function getResponse(): LengthAwarePaginator
    {
        return $this->companies;
    }
}
