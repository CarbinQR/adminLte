<?php

use App\Http\Controllers\Web\CompanyController;
use App\Http\Controllers\Web\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Auth::routes();

Route::middleware('auth')->prefix('companies')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('companiesList');
    Route::delete('/destroy/{id}', [CompanyController::class, 'destroy'])->name('companyDestroy');
    Route::get('/edit/{id}', [CompanyController::class, 'edit'])->name('companyEdit');
    Route::put('/update/{id}', [CompanyController::class, 'update'])->name('companyUpdate');
    Route::get('/show/{id}', [CompanyController::class, 'show'])->name('companyShow');
    Route::get('/create', [CompanyController::class, 'create'])->name('companyCreate');
    Route::post('/store', [CompanyController::class, 'store'])->name('companyStore');
    Route::post('/attach-customer', [CompanyController::class, 'attachCustomers'])->name('companyAttachCustomers');
});

Route::middleware('auth')->prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customersList');
    Route::delete('/destroy/{id}', [CustomerController::class, 'destroy'])->name('customerDestroy');
    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customerEdit');
    Route::put('/update/{id}', [CustomerController::class, 'update'])->name('customerUpdate');
    Route::get('/show/{id}', [CustomerController::class, 'show'])->name('customerShow');
    Route::get('/create', [CustomerController::class, 'create'])->name('customerCreate');
    Route::post('/store', [CustomerController::class, 'store'])->name('customerStore');
    Route::delete('/detach', [CustomerController::class, 'detach'])->name('customerDetach');
});
