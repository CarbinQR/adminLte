<?php

namespace App\Actions\Web\Customer;

use Illuminate\Pagination\LengthAwarePaginator;

final class GetCustomersListResponse
{
    private LengthAwarePaginator $customersList;

    public function __construct(LengthAwarePaginator $customersList)
    {
        $this->customersList = $customersList;
    }

    public function getResponse(): LengthAwarePaginator
    {
        return $this->customersList;
    }
}
