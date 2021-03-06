<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->prefix('companies')->group(function () {
    Route::get('/', [CompanyController::class, 'index']);
    Route::get('/client-companies/{customerId}', [CompanyController::class, 'getCompaniesByCustomerId']);
});

Route::middleware('auth:api')->prefix('customers')->group(function () {
    Route::get('/clients/{companyId}', [CustomerController::class, 'findCustomersByCompanyId']);
});
