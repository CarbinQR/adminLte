<?php

namespace App\Actions\Web\Company;

use Illuminate\Database\Eloquent\Builder;

final class ShowCompanyWithCustomersResponse
{
    private Builder $company;

    public function __construct(Builder $company)
    {
        $this->company = $company;
    }

    public function getResponse(): Builder
    {
        return $this->company;
    }
}
