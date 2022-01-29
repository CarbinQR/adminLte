<?php

namespace App\Http\Controllers\Web;

use App\Actions\Web\Company\AttachCustomersToCompanyAction;
use App\Actions\Web\Company\AttachCustomersToCompanyRequest;
use App\Actions\Web\Company\DestroyCompanyAction;
use App\Actions\Web\Company\DestroyCompanyRequest;
use App\Actions\Web\Company\GetCompaniesListAction;
use App\Actions\Web\Company\ShowCompanyAction;
use App\Actions\Web\Company\ShowCompanyRequest;
use App\Actions\Web\Company\StoreCompanyAction;
use App\Actions\Web\Company\StoreCompanyRequest;
use App\Actions\Web\Company\UpdateCompanyAction;
use App\Actions\Web\Company\UpdateCompanyRequest;
use App\Actions\Web\Customer\GetCustomersListAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Company\AttachCustomersToCompanyValidationRequest;
use App\Http\Requests\Company\StoreCompanyValidationRequest;
use App\Http\Requests\Company\UpdateCompanyValidationRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

final class CompanyController extends Controller
{
    public function index(
        GetCompaniesListAction $companyListAction,
        GetCustomersListAction $customersListAction
    ): Factory|View|Application
    {
        $companiesList = $companyListAction
            ->execute()
            ->getResponse();

        $customersList = $customersListAction
            ->execute()
            ->getResponse();

        return view('pages.company.index', [
            'companiesList' => $companiesList,
            'customersList' => $customersList
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('pages.company.create');

    }

    public function store(
        StoreCompanyAction $storeCompanyAction,
        StoreCompanyValidationRequest $request): RedirectResponse
    {
        $storeCompanyAction->execute(
            new StoreCompanyRequest(
                $request->input('name'),
                $request->input('email'),
                $request->input('address')
            )
        )->getResponse();

        return redirect()->route('companiesList');
    }

    public function show(
        ShowCompanyAction $showCompanyAction,
        string $id
    ): Factory|View|Application
    {
        $company = $showCompanyAction->execute(
            new ShowCompanyRequest(
                (int)$id
            )
        )->getResponse();

        return view('pages.company.show', ['company' => $company]);
    }

    public function edit(
        ShowCompanyAction $showCompanyAction,
        string $id
    ): Factory|View|Application
    {
        $company = $showCompanyAction->execute(
            new ShowCompanyRequest(
                (int)$id
            )
        )->getResponse();

        return view('pages.company.edit', ['company' => $company]);
    }

    public function update(
        UpdateCompanyValidationRequest $request,
        UpdateCompanyAction $updateCompanyAction
    ): RedirectResponse
    {
        $updatedCompany = $updateCompanyAction
            ->execute(
                new UpdateCompanyRequest(
                    (int)$request->id,
                    $request->input('name'),
                    $request->input('email'),
                    $request->input('address')
                )
            )->getResponse();

        return redirect()
            ->route('companyEdit', ['id' => $updatedCompany->id])
            ->with([session('success') => 'Запись обновлена']);
    }

    public function destroy(
        DestroyCompanyAction $destroyCompanyAction,
        string $id
    ): RedirectResponse
    {
        $destroyCompanyAction->execute(
            new DestroyCompanyRequest(
                (int)$id
            )
        );

        return redirect()->back()->with([session('success') => 'Удалено']);
    }

    public function attachCustomers(
        AttachCustomersToCompanyAction $attachCustomersToCompanyAction,
        AttachCustomersToCompanyValidationRequest $request
    ): RedirectResponse
    {
        $attachCustomersToCompanyAction->execute(
            new AttachCustomersToCompanyRequest(
                (int)$request->id,
                $request->input('customersIdArray')
            )
        );

        return redirect()->back()->with([session('success') => 'Пользователи добавлены']);
    }
}
