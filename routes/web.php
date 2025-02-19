<?php

use App\Http\Controllers\backoffice\CategoryController;
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

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});



Route::middleware(['auth', 'admin','showMenu'])->prefix('backoffice')->name('backoffice.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::post('category/datatable', [CategoryController::class,'datatable'])->name('category.datatable');

});



Route::get('/', function () {
    return view('welcome');
});

