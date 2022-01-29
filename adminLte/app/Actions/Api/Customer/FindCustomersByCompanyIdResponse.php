<?php

namespace App\Actions\Api\Customer;

use Illuminate\Pagination\LengthAwarePaginator;

final class FindCustomersByCompanyIdResponse
{
    private LengthAwarePaginator $customers;

    public function __construct(LengthAwarePaginator $customers)
    {
        $this->customers = $customers;
    }

    public function getResponse(): LengthAwarePaginator
    {
        return $this->customers;
    }
}
