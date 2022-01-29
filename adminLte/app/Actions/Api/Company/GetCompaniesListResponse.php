<?php

namespace App\Actions\Api\Company;

use Illuminate\Pagination\LengthAwarePaginator;

final class GetCompaniesListResponse
{
    private LengthAwarePaginator $companiesList;

    public function __construct(LengthAwarePaginator $companiesList)
    {
        $this->companiesList = $companiesList;
    }

    public function getResponse(): LengthAwarePaginator
    {
        return $this->companiesList;
    }
}
