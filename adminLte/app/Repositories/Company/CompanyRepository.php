<?php

namespace App\Repositories\Company;

use App\Constant\CompanyConstant;
use App\Models\Company;
use http\Exception\InvalidArgumentException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Company::orderBy('id', 'desc')->paginate(CompanyConstant::PER_PAGE);
    }

    public function destroy(Company $company): void
    {
        if(!$company->delete()) {
            throw new InvalidArgumentException('Ошибка при удалении компании');
        }
    }

    public function findById(int $id): Company
    {
        if(!$company = Company::find($id)) {
            throw new InvalidArgumentException('Компания не найдена');
        }

        return $company;
    }

    public function findByIdWithCustomers(int $id): Builder
    {
        if(!$company = $this
            ->findById($id)
            ->with('customers')
        ) {
            throw new InvalidArgumentException('Компания не найдена');
        }

        return $company;
    }

    public function update(Company $company): Company
    {
        if(!$company->update()) {
            throw new InvalidArgumentException('Ошибка при обновлении компании');
        }

        return $company;
    }

    public function store(Company $company): Company
    {
        if(!$company->save()) {
            throw new InvalidArgumentException('Ошибка при добавлении компании');
        }

        return $company;
    }
}
