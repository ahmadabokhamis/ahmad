<?php

use App\Http\Controllers\Auth\company\AuthenticatedSessionController;
use App\Http\Controllers\Auth\company\ConfirmablePasswordController;
use App\Http\Controllers\Auth\company\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\company\EmailVerificationPromptController;
use App\Http\Controllers\Auth\company\NewPasswordController;
use App\Http\Controllers\Auth\company\PasswordController;
use App\Http\Controllers\Auth\company\PasswordResetLinkController;
use App\Http\Controllers\Auth\company\RegisteredUserController;
use App\Http\Controllers\Auth\company\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('company.register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('company.login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('company.password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('company.password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('company.password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('company.password.store');
});

Route::middleware('auth.company')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('company.verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('company.verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('company.verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('company.password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('company.password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('company.logout');
});



