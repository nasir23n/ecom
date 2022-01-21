<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FilterController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ProductDetailsController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/info', function() {
    return phpinfo();
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('product/details/{product}/{name}', [ProductDetailsController::class, 'index'])->name('product.details');
Route::get('product/search/{search?}', [ProductDetailsController::class, 'search'])->name('product.search');
Route::get('catagory/{name}', [FilterController::class, 'catagory'])->name('catagory');

Route::post('price/filter', [FilterController::class, 'filter'])->name('filter');
Route::post('product/cart/add', [CartController::class, 'store'])->name('cart.add');
Route::post('product/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('product/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('product/cart', [CartController::class, 'show'])->name('cart');
Route::get('order', [OrderController::class, 'show'])->name('order');
Route::get('order/confirm', [OrderController::class, 'index'])->name('order.confirm');
Route::get('order/{order}/edit', [OrderController::class, 'order_edit'])->name('order.edit');
Route::post('order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
Auth::routes();

Route::get('/dashboard', function() {
    return view('frontend.user.dashboard');
})->name('user.dashboard');

include_once __DIR__."/backend.php";

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
