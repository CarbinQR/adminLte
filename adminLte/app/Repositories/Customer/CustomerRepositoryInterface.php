<?php

namespace App\Repositories\Customer;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

interface CustomerRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
    public function destroy(Customer $customer): void;
    public function detach(Customer $customer, array $companyIdsArr): void;
    public function findById(int $id): Customer;
    public function findByIdWithCompanies(int $id): Builder;
    public function update(Customer $customer): Customer;
    public function store(Customer $customer): Customer;
    public function findCustomersByCompanyId(int $companyId): LengthAwarePaginator;
}
