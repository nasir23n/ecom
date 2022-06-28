<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Brand\BrandController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Deshboard\DashboardController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UnitController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.', 'prefix' => 'admin'], function() {
    Route::get('login', [LoginController::class, 'show_login_form'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
});
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('brands', BrandController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('units', UnitController::class);
    Route::resource('products', ProductController::class);

    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}', [OrderController::class, 'confirm'])->name('orders.confirm');
    // Route::group(['as' => 'category.', 'prefix' => 'category'], function() {
    //     Route::get('/index', [CategoryController::class, 'index'])->name('index');
    //     Route::get('/create', [CategoryController::class, 'create'])->name('create');
    //     Route::post('/store', [CategoryController::class, 'store'])->name('store');
    //     Route::get('/{category}/edit/', [CategoryController::class, 'edit'])->name('edit');
    //     Route::post('/{category}/update/', [CategoryController::class, 'update'])->name('update');
    //     Route::delete('/{category}/delete/', [CategoryController::class, 'delete'])->name('delete');
    // });

    // Route::get('/index', [PurchaseController::class, 'index'])->name('index');
    // Route::get('/filter_product', [PurchaseController::class, 'filterProduct'])->name('filter_product');
    // Route::get('/get_products', [PurchaseController::class, 'get_products'])->name('get_products');
    // Route::get('/{purchase}/add_products', [PurchaseController::class, 'add_products'])->name('add_products');
    // Route::post('/{purchase}/store_products', [PurchaseController::class, 'store_products'])->name('store_products');
    // Route::get('/create', [PurchaseController::class, 'create'])->name('create');
    // Route::post('/store', [PurchaseController::class, 'store'])->name('store');
    // Route::get('/{purchase}/show/', [PurchaseController::class, 'show'])->name('show');
    // Route::post('/{purchase}/confirm/', [PurchaseController::class, 'confirm'])->name('confirm');
    // Route::get('/{purchase}/edit/', [PurchaseController::class, 'edit'])->name('edit');
    // Route::post('/{purchase}/update/', [PurchaseController::class, 'update'])->name('update');
    // Route::delete('/{purchase}/delete/', [PurchaseController::class, 'delete'])->name('delete');
});
Route::prefix('admin')->group(function() {


    
    /**
     * Product routes
     */
    // Route::get('product/add', [ProductController::class, 'index'])->name('product.add');
    // Route::post('product/info', [ProductController::class, 'info_add'])->name('product.info.add');
    // Route::get('product/{product}/info', [ProductController::class, 'info_edit'])->name('product.info.edit');
    // Route::post('product/{product}/update', [ProductController::class, 'info_update'])->name('product.info.update');
    // Route::get('product/{product}/gallery', [ProductController::class, 'gallery'])->name('product.gallery');
    // Route::get('product/{product}/publish', [ProductController::class, 'publish'])->name('product.publish');
    // Route::post('product/{product}/publish', [ProductController::class, 'publish_product']);

    // Route::get('product/all', [ProductController::class, 'all'])->name('product.all');
    // Route::post('product/{product}/single_upload', [ProductController::class, 'single_upload'])->name('single_upload');
    // Route::post('product/{product}/multi_upload', [ProductController::class, 'multi_upload'])->name('multi_upload');

    // Route::post('product/{product}/delete_multi', [ProductController::class, 'delete_multi'])->name('delete_multi');
    // Route::post('product/{product}/delete_single', [ProductController::class, 'delete_single'])->name('delete_single');

    // Route::resource('category', CategoryController::class);
    // Route::post('remove', [ProductController::class, 'remove'])->name('remove');
    // Route::post('product/add', [ProductController::class, 'store']);
    // Route::get('product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    // Route::put('product/update/{product}', [ProductController::class, 'update'])->name('product.update');
    // Route::delete('product/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('product/croup', function() {
        return view('backend.product.croup');
    });
});


