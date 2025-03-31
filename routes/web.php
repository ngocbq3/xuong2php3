<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [ProductController::class, 'index']);

//Lấy dữ liệu sản phẩm
Route::get('/test2', [ProductController::class, 'list']);
Route::get('/test-eager-loading', [ProductController::class, 'listEagerLoading']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('/products', AdminProductController::class);
    Route::get('/variants/{id}/product', [ProductVariantController::class, 'index'])->name('variants.index');
    Route::get('/variants/{id}/create', [ProductVariantController::class, 'create'])->name('variants.create');
    Route::post('/variants', [ProductVariantController::class, 'store'])->name('variants.store');
    Route::get('/variants/{id}/edit', [ProductVariantController::class, 'edit'])->name('variants.edit');
    Route::put('/variants', [ProductVariantController::class, 'update'])->name('variants.update');
    Route::delete('/variants/{id}', [ProductVariantController::class, 'destroy'])->name('variants.destroy');
});
