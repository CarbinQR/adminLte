<?php

namespace App\Http\Controllers\Web;

use App\Actions\Web\Customer\DestroyCustomerAction;
use App\Actions\Web\Company\GetCompaniesListAction;
use App\Actions\Web\Customer\DetachCustomerAction;
use App\Actions\Web\Customer\DetachCustomerRequest;
use App\Actions\Web\Customer\StoreCustomerAction;
use App\Actions\Web\Customer\UpdateCustomerAction;
use App\Actions\Web\Customer\DestroyCustomerRequest;
use App\Actions\Web\Customer\GetCustomersListAction;
use App\Actions\Web\Customer\ShowCustomerAction;
use App\Actions\Web\Customer\ShowCustomerRequest;
use App\Actions\Web\Customer\StoreCustomerRequest;
use App\Actions\Web\Customer\UpdateCustomerRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\DetachCustomersToCompanyValidationRequest;
use App\Http\Requests\Customer\StoreCustomerValidationRequest;
use App\Http\Requests\Customer\UpdateCustomerValidationRequest;

final class CustomerController extends Controller
{
    public function index(GetCustomersListAction $customersListAction)
    {
        $customersList = $customersListAction
            ->execute()
            ->getResponse();

        return view('pages.customer.index', [ 'customersList' => $customersList]);
    }

    public function create(GetCompaniesListAction $companyListAction)
    {
        $companiesList = $companyListAction
            ->execute()
            ->getResponse();

        return view('pages.customer.create', ['companiesList' => $companiesList]);
    }

    public function store(
        StoreCustomerAction $storeCustomerAction,
        StoreCustomerValidationRequest $request)
    {
        $storeCustomerAction->execute(
            new StoreCustomerRequest(
                $request->input('name'),
                $request->input('surname'),
                $request->input('email'),
                $request->input('phone_number'),
                $request->input('companiesIdArray')
            )
        )->getResponse();

        return redirect()->route('customersList');
    }

    public function show(
        ShowCustomerAction $showCustomerAction,
        string $id
    ) {
        $customer = $showCustomerAction->execute(
            new ShowCustomerRequest(
                (int) $id
            )
        )->getResponse();

        return view('pages.customer.show', [ 'customer' => $customer]);
    }

    public function edit(
        ShowCustomerAction $showCustomerAction,
        string $id
    ) {
        $customer = $showCustomerAction->execute(
            new ShowCustomerRequest(
                (int) $id
            )
        )->getResponse();

        return view('pages.customer.edit', [ 'customer' => $customer]);
    }

    public function update(
        UpdateCustomerValidationRequest $request,
        UpdateCustomerAction $updateCustomerAction
    ) {
        $updatedCustomer = $updateCustomerAction
            ->execute(
                new UpdateCustomerRequest(
                    (int) $request->id,
                    $request->input('name'),
                    $request->input('surname'),
                    $request->input('email'),
                    $request->input('phone_number')
                )
            )->getResponse();

        return redirect()
            ->route('customerEdit', ['id' => $updatedCustomer->id])
            ->with([session('success') => 'Запись обновлена']);
    }

    public function destroy(
        DestroyCustomerAction $destroyCustomerAction,
        string $id
    ) {
        $destroyCustomerAction->execute(
            new DestroyCustomerRequest(
                (int)$id
            )
        );

        return redirect()->back()->with([session('success') => 'Удалено']);
    }

    public function detach(
        DetachCustomerAction $destroyCustomerAction,
        DetachCustomersToCompanyValidationRequest $request
    ) {
        $destroyCustomerAction->execute(
            new DetachCustomerRequest(
                (int)$request->customerId,
                (int)$request->companyId
            )
        );

        return redirect()->back()->with([session('success') => 'Пользователь откреплен']);
    }
}
