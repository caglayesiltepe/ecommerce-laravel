<?php

use App\Http\Controllers\backoffice\AttributeValueController;
use App\Http\Controllers\backoffice\CategoryController;
use App\Http\Controllers\backoffice\OpenAIController;
use App\Http\Controllers\backoffice\ProductController;
use App\Http\Controllers\backoffice\BrandController;
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
    Route::resource('product', ProductController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('attribute-value', AttributeValueController::class);
    Route::get('/get-attribute-values/{attributeId}', [AttributeValueController::class, 'getAttributeValues']);
    Route::post('/openai/web-translation-send', [OpenAIController::class, 'webTranslationSend']);
    Route::post('category/datatable', [CategoryController::class,'datatable'])->name('category.datatable');
    Route::post('product/datatable', [ProductController::class,'datatable'])->name('product.datatable');
    Route::post('brand/datatable', [BrandController::class,'datatable'])->name('brand.datatable');
    Route::post('attributeValue/datatable', [AttributeValueController::class,'datatable'])->name('attributeValue.datatable');

});



Route::get('/', function () {
    return view('welcome');
});

