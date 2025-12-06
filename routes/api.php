<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIAuthController;
use App\Http\Controllers\ProductController;

Route::post('login', [APIAuthController::class, 'login'])->name('api.login');
Route::middleware('verify')->group(function () {
    Route::apiResource('products', ProductController::class)->names([
        'index' => 'products.index',
        'show' => 'products.show',
        'store' => 'products.store',
        'update' => 'products.update',
        'destroy' => 'products.destroy',
    ]);
});
