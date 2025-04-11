<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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
    Route::put('/variants/{id}', [ProductVariantController::class, 'update'])->name('variants.update');
    Route::delete('/variants/{id}', [ProductVariantController::class, 'destroy'])->name('variants.destroy');
    //Hiển thị đơn hàng
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    //Chi tiết đơn hàng
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    //Cập nhật trạng thái đơn hàng
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('orders.update');
});

//Client
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', [ProductController::class, 'show'])->name('product.detail');

Route::get('/get-variant/price', [ProductController::class, 'getAttributePrice'])->name('product.get-variant-price');




// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Thêm sản phẩm vào giỏ hàng
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    //hiển thị giỏ hàng
    Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
    //hiển thị form thanh toán
    Route::get('/cart/checkout', [CartController::class, 'showCheckout'])->name('cart.checkout');
    //Thanh toán
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout.post');
});

require __DIR__ . '/auth.php';
