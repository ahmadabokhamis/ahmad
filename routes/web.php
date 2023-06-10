<?php

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
    Route::get('/customers', function () {
        return view('dashboard.customers.customers');
    })->name('customers');
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
