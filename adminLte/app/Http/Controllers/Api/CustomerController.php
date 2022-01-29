<?php

namespace App\Http\Controllers\Api;

use App\Actions\Api\Customer\FindCustomersByCompanyIdAction;
use App\Actions\Api\Customer\FindCustomersByCompanyIdRequest;
use App\Http\Controllers\Controller;

final class CustomerController extends Controller
{
    public function findCustomersByCompanyId(
        FindCustomersByCompanyIdAction $byCompanyIdAction,
        string $companyId
    ): \Illuminate\Http\JsonResponse
    {
        $customersList = $byCompanyIdAction->execute(
            new FindCustomersByCompanyIdRequest(
                (int) $companyId
            )
        )->getResponse();

        return response()->json($customersList, 200);
    }
}
