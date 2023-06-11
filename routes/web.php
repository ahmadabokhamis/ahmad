<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdvertisementController;
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
    return view('welcome');
});
Route::middleware('auth.admin')->get('/home', function () {
    return 5;
});


require __DIR__.'/admin.php';
require __DIR__.'/company.php';


Route::name('admin.')->group(function () {


    Route::get('/admin', function () {
        return view('dashboard.index');
    })->name('index');


    Route::get('/companies', function () {
        return view('dashboard.companies.companies');
    })->name('companies');


    Route::get('/products', function () {
        return view('dashboard.products.products');
    })->name('products');

    Route::get('/products/add', [ProductController::class,'addProductPage'])->name('products.add');
    Route::get('/customers/add', [CustomerController::class,'addCustomerPage'])->name('customers.add');
    Route::get('/orders/add', [OrderController::class,'addOrderPage'])->name('orders.add');
    Route::get('/categories/add', [CategoryController::class,'addCategoryPage'])->name('categories.add');
    Route::get('/companies/add', [CompanyController::class,'addCompanyPage'])->name('companies.add');
    Route::get('/advertisement/add', [AdvertisementController::class,'addAdvertisementPage'])->name('advertisement.add');


    Route::post('/products/store', [ProductController::class,'store'])->name('products.store');
    Route::post('/customers/store', [CustomerController::class,'store'])->name('customers.store');
    Route::post('/orders/store', [OrderController::class,'store'])->name('orders.store');
    Route::post('/categories/store', [CategoryController::class,'store'])->name('categories.store');
    Route::post('/companies/store', [CompanyController::class,'store'])->name('companies.store');
    Route::post('/advertisement/store', [AdvertisementController::class,'store'])->name('companies.store');











    Route::get('/products/edit/{id}', [ProductController::class,'editProductPage'])->name('products.edit');
    Route::get('/customers/edit/{id}', [CustomerController::class,'editCustomerPage'])->name('customers.edit');
    Route::get('/orders/edit/{id}', [OrderController::class,'editOrderPage'])->name('orders.add');
    Route::get('/categories/edit/{id}', [CategoryController::class,'editCategoryPage'])->name('categories.edit');
    Route::get('/companies/edit/{id}', [CompanyController::class,'editCompanyPage'])->name('companies.edit');
    Route::get('/advertisement/edit/{id}', [CompanyController::class,'editAdvertisementPage'])->name('advertisement.edit');






        Route::get('/customers', function () {
        return view('dashboard.customers.customers');
        })->name('customers');



    Route::get('/advertisement', function () {
        return view('dashboard.advertisement.advertisement');
    })->name('advertisement');



    Route::get('/orders', function () {
        return view('dashboard.orders.orders');
    })->name('orders');
    Route::get('/categories', function () {
        return view('dashboard.categories.categories');
    })->name('categories');


    Route::get('/users', function () {
        return view('dashboard.users.index');
    })->name('users');

    Route::get('/roles', function () {
        return view('dashboard.roles.index');
    })->name('roles');
});
