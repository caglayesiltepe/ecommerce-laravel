<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backoffice\AdminController;
use App\Http\Controllers\backoffice\AuthController;

Route::prefix('backoffice')->name('backoffice.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])
        ->name('login')
        ->middleware('redirect_if_authenticated');

    Route::post('login', [AuthController::class, 'login']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword'])
        ->name('forgot-password');
});



Route::middleware(['auth', 'admin','showMenu'])->group(function () {
    Route::get('backoffice/dashboard', [AdminController::class, 'dashboard'])
        ->name('backoffice.dashboard');
});



Route::get('/', function () {
    return view('welcome');
});

