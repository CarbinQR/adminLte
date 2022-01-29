<?php

namespace App\Repositories\Company;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

interface CompanyRepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
    public function destroy(Company $company): void;
    public function findById(int $id): Company;
    public function findByIdWithCustomers(int $id): Builder;
    public function update(Company $company): Company;
    public function store(Company $company): Company;
    public function findCompaniesByCustomerId(int $customerId): LengthAwarePaginator;

}
