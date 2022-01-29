<?php

namespace App\Http\Controllers\Api;

use App\Actions\Api\Company\FindCompaniesByCustomerIdAction;
use App\Actions\Api\Company\FindCompaniesByCustomerIdRequest;
use App\Actions\Api\Company\GetCompaniesListAction;
use App\Http\Controllers\Controller;

final class CompanyController extends Controller
{
    public function index(GetCompaniesListAction $companyListAction): \Illuminate\Http\JsonResponse
    {
        $companiesList = $companyListAction
            ->execute()
            ->getResponse();

        return response()->json($companiesList, 200);
    }

    public function getCompaniesByCustomerId(
        FindCompaniesByCustomerIdAction $byCustomerIdAction,
        string $customerId
    ): \Illuminate\Http\JsonResponse
    {
        $companiesList = $byCustomerIdAction->execute(
            new FindCompaniesByCustomerIdRequest(
                (int)$customerId
            )
        )->getResponse();

        return response()->json($companiesList, 200);
    }
}
