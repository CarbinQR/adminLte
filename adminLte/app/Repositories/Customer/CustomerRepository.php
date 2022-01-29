<?php

namespace App\Repositories\Customer;

use App\Constant\CustomerConstant;
use App\Models\Company;
use App\Models\Customer;
use http\Exception\InvalidArgumentException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

final class CustomerRepository implements CustomerRepositoryInterface
{
    public function getAll(): LengthAwarePaginator
    {
        return Customer::orderBy('id', 'desc')->paginate(CustomerConstant::PER_PAGE);
    }

    public function destroy(Customer $customer): void
    {
        if(!$customer->delete()) {
            throw new InvalidArgumentException('Ошибка при удалении клиента');
        }
    }

    public function detach(Customer $customer, array $companyIdsArr): void
    {
        if(!$customer->companies()->detach($companyIdsArr)) {
            throw new InvalidArgumentException('Ошибка при откреплении клиента');
        }
    }

    public function findById(int $id): Customer
    {
        if(!$customer = Customer::find($id)) {
            throw new InvalidArgumentException('Клиент не найден');
        }

        return $customer;
    }

    public function findByIdWithCompanies(int $id): Builder
    {
        if(!$customer = $this
            ->findById($id)
            ->with('companies')
        ) {
            throw new InvalidArgumentException('Клиент не найден');
        }

        return $customer;
    }

    public function update(Customer $customer): Customer
    {
        if(!$customer->update()) {
            throw new InvalidArgumentException('Ошибка при обновлении данных клиента');
        }

        return $customer;
    }

    public function store(Customer $customer): Customer
    {
        if(!$customer->save()) {
            throw new InvalidArgumentException('Ошибка при создании клиента');
        }

        return $customer;
    }

    public function findCustomersByCompanyId(int $companyId): LengthAwarePaginator
    {
        if(!$customers = Company::find($companyId)
            ->customers()->paginate(CustomerConstant::PER_PAGE)
        ) {
            throw new InvalidArgumentException('Компания не найдена');
        }

        return $customers;
    }
}
