<?php

namespace App\Http\Controllers\Web;

use App\Actions\Web\Customer\DestroyCustomerAction;
use App\Actions\Web\Company\GetCompaniesListAction;
use App\Actions\Web\Customer\DetachCustomerAction;
use App\Actions\Web\Customer\DetachCustomerRequest;
use App\Actions\Web\Customer\ShowCustomerWithCompaniesAction;
use App\Actions\Web\Customer\ShowCustomerWithCompaniesRequest;
use App\Actions\Web\Customer\StoreCustomerAction;
use App\Actions\Web\Customer\UpdateCustomerAction;
use App\Actions\Web\Customer\DestroyCustomerRequest;
use App\Actions\Web\Customer\GetCustomersListAction;
use App\Actions\Web\Customer\ShowCustomerAction;
use App\Actions\Web\Customer\ShowCustomerRequest;
use App\Actions\Web\Customer\StoreCustomerRequest;
use App\Actions\Web\Customer\UpdateCustomerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(GetCustomersListAction $customersListAction)
    {
        $customersList = $customersListAction
            ->execute()
            ->getResponse();

        return view('pages.customer.index', [ 'customersList' => $customersList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(GetCompaniesListAction $companyListAction)
    {
        $companiesList = $companyListAction
            ->execute()
            ->getResponse();

        return view('pages.customer.create', ['companiesList' => $companiesList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(
        StoreCustomerAction $storeCustomerAction,
        Request $request)
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

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(
        Request $request,
        UpdateCustomerAction $updateCustomerAction
    ) {
        $updatedCustomer = $updateCustomerAction
            ->execute(
                new UpdateCustomerRequest(
                    (int) $request->id,
                    $request->input('name'),
                    $request->input('surname'),
                    $request->input('email'),
                    $request->input('phone_number'),
                    $request->input('companiesIdArray')
                )
            )->getResponse();

        return redirect()
            ->route('customerEdit', ['id' => $updatedCustomer->id])
            ->with(['success' => 'Запись обновлена']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(
        DestroyCustomerAction $destroyCustomerAction,
        string $id
    ) {
        $destroyCustomerAction->execute(
            new DestroyCustomerRequest(
                (int)$id
            )
        );

        return redirect()->back()->with(['succes' => 'Удалено']);
    }

    public function detach(
        DetachCustomerAction $destroyCustomerAction,
        Request $request
    ) {
        $destroyCustomerAction->execute(
            new DetachCustomerRequest(
                (int)$request->customerId,
                (int)$request->companyId
            )
        );

        return redirect()->back()->with(['succes' => 'Пользователь откреплен']);
    }
}
