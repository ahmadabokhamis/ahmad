<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

use Illuminate\Http\Request;



Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::middleware('isAdmin')->group(function () {

            Route::get('/', function () {
                return view('dashboard.index');
            });

            Route::get('/index', function () {
                return view('dashboard.index');
            })->name('index');






            /* products   */

            Route::get('/products',[ProductController::class,'index'])->name('products');
            Route::get('/products/add', [ProductController::class,'addProductPage'])->name('products.add');
            Route::post('/products/store', [ProductController::class,'store'])->name('products.store');
            Route::get('/products/edit/{id}', [ProductController::class,'editProductPage'])->name('products.edit');
            Route::post('/products/update', [ProductController::class,'update'])->name('products.update');




            /* customers   */
            Route::get('/customers',[CustomerController::class,'index'])->name('customers');
            Route::get('/customers/add', [CustomerController::class,'addCustomerPage'])->name('customers.add');
            Route::post('/customers/store', [CustomerController::class,'store'])->name('customers.store');
            Route::get('/customers/edit/{id}', [CustomerController::class,'editCustomerPage'])->name('customers.edit');
            Route::post('/customers/update', [CustomerController::class,'update'])->name('customers.update');




            /* orders   */

            Route::get('/orders',[OrderController::class,'index'])->name('orders');
            Route::get('/orders/add', [OrderController::class,'addOrderPage'])->name('orders.add');
            Route::post('/orders/store', [OrderController::class,'store'])->name('orders.store');
            Route::get('/orders/edit/{id}', [OrderController::class,'editOrderPage'])->name('orders.edit');
            Route::post('/orders/update', [OrderController::class,'update'])->name('orders.update');





            /* categories   */

            Route::get('/categories',[CategoryController::class,'index'])->name('categories');
            Route::get('/categories/add', [CategoryController::class,'addCategoryPage'])->name('categories.add');
            Route::post('/categories/store', [CategoryController::class,'store'])->name('categories.store');
            Route::get('/categories/edit/{id}', [CategoryController::class,'editCategoryPage'])->name('categories.edit');
            Route::post('/categories/update', [CategoryController::class,'update']);







            /* companies   */

            Route::get('/companies',  [CompanyController::class,'index'])->name('companies');
            Route::get('/companies/add', [CompanyController::class,'addCompanyPage'])->name('companies.add');
            Route::post('/companies/store', [CompanyController::class,'store'])->name('companies.store');
            Route::get('/companies/edit/{id}', [CompanyController::class,'editCompanyPage'])->name('companies.edit');
            Route::post('/companies/update', [CompanyController::class,'update'])->name('companies.update');



            /* advertisement   */

            Route::get('/advertisement', function () {
                return view('dashboard.advertisement.advertisement');
            })->name('advertisement');

            Route::get('/advertisement/add', [AdvertisementController::class,'addAdvertisementPage'])->name('advertisement.add');
            Route::post('/advertisement/store', [AdvertisementController::class,'store'])->name('advertisement.store');
            Route::get('/advertisement/edit/{id}', [AdvertisementController::class,'editAdvertisementPage'])->name('advertisement.edit');
            Route::post('/advertisement/update', [AdvertisementController::class,'update'])->name('advertisement.update');









            Route::resource('users', UserController::class);
            Route::resource('roles', RoleController::class);






            // Route::get('/users', function () {
            //     return view('dashboard.users.index');
            // })->name('users');

            // Route::get('/roles', function () {
            //     return view('dashboard.roles.index');
            // })->name('roles');
        });

        require __DIR__ . '/admin_auth.php';
    });
