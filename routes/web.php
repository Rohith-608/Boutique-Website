<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/checkout/{id}', [ProductController::class, 'checkout']);
Route::post('/place-order', [ProductController::class, 'placeOrder']);

// Secure routes (Only logged-in admin can see)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/upload', [ProductController::class, 'showAdmin']);
    Route::post('/admin/products', [ProductController::class, 'store']);
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy']);
});

require __DIR__.'/auth.php';
