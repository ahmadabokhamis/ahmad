<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

use Illuminate\Http\Request;



Route::prefix('company')
    ->name('company.')
    ->group(function () {
        Route::middleware('isCompany')->group(function () {

            Route::get('/', function () {
                return view('company.index');
            });

            Route::get('/index', function () {
                return view('company.index');
            })->name('index');

            Route::get('/companies', function () {
                return view('company.companies.companies');
            })->name('companies');


            Route::get('/products', function () {
                return view('company.products.products');
            })->name('products');

            Route::get('/products/add', [ProductController::class,'companyAddProductPage'])->name('products.add');


            Route::get('/categories/add', [CategoryController::class,'companyAddCategoryPage'])->name('categories.add');

            // Route::get('/advertisement/add', [AdvertisementController::class,'addAdvertisementPage'])->name('advertisement.add');


            Route::post('/products/store', [ProductController::class,'store'])->name('products.store');
            // Route::post('/customers/store', [CustomerController::class,'store'])->name('customers.store');
            // Route::post('/orders/store', [OrderController::class,'store'])->name('orders.store');
            Route::post('/categories/store', [CategoryController::class,'store'])->name('categories.store');
            // Route::post('/companies/store', [CompanyController::class,'store'])->name('companies.store');
            // Route::post('/advertisement/store', [AdvertisementController::class,'store'])->name('companies.store');











            Route::get('/products/edit/{id}', [ProductController::class,'companyEditProductPage'])->name('products.edit');
            // Route::get('/customers/edit/{id}', [CustomerController::class,'editCustomerPage'])->name('customers.edit');
            // Route::get('/orders/edit/{id}', [OrderController::class,'editOrderPage'])->name('orders.add');
            Route::get('/categories/edit/{id}', [CategoryController::class,'companyEditCategoryPage'])->name('categories.edit');
            Route::get('/companies/edit/{id}', [CompanyController::class,'editCompanyPage'])->name('companies.edit');


            // Route::get('/advertisement/edit/{id}', [CompanyController::class,'editAdvertisementPage'])->name('advertisement.edit');






                // Route::get('/customers', function () {
                // return view('dashboard.customers.customers');
                // })->name('customers');



            // Route::get('/advertisement', function () {
            //     return view('dashboard.advertisement.advertisement');
            // })->name('advertisement');



            Route::get('/orders', function () {
                return view('company.orders.orders');
            })->name('orders');

            Route::get('/categories', function () {
                return view('company.categories.categories');
            })->name('categories');


            // Route::get('/users', function () {
            //     return view('dashboard.users.index');
            // })->name('users');

            // Route::get('/roles', function () {
            //     return view('dashboard.roles.index');
            // })->name('roles');
        });




        require __DIR__ . '/company_auth.php';
    });
