<?php

namespace App\Actions\Web\Customer;

use Illuminate\Database\Eloquent\Builder;

final class ShowCustomerWithCompaniesResponse
{
    private Builder $customer;

    public function __construct(Builder $customer)
    {
        $this->customer = $customer;
    }

    public function getResponse(): Builder
    {
        return $this->customer;
    }
}
