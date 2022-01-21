<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Deshboard\DeshboardController;
use App\Http\Controllers\Backend\Product\ProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function() {
    Route::get('login', [LoginController::class, 'show_login_form'])->name('admin.login');
    Route::post('login', [LoginController::class, 'login']);

    Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('deshboard', [DeshboardController::class, 'index'])->name('admin.deshboard');

    /**
     * Product routes
     */
    Route::get('product/add', [ProductController::class, 'index'])->name('product.add');
    Route::post('product/info', [ProductController::class, 'info_add'])->name('product.info.add');
    Route::get('product/{product}/info', [ProductController::class, 'info_edit'])->name('product.info.edit');
    Route::post('product/{product}/update', [ProductController::class, 'info_update'])->name('product.info.update');
    Route::get('product/{product}/gallery', [ProductController::class, 'gallery'])->name('product.gallery');
    Route::get('product/{product}/publish', [ProductController::class, 'publish'])->name('product.publish');
    Route::post('product/{product}/publish', [ProductController::class, 'publish_product']);


    Route::get('product/all', [ProductController::class, 'all'])->name('product.all');
    Route::post('product/{product}/single_upload', [ProductController::class, 'single_upload'])->name('single_upload');
    Route::post('product/{product}/multi_upload', [ProductController::class, 'multi_upload'])->name('multi_upload');

    Route::post('product/{product}/delete_multi', [ProductController::class, 'delete_multi'])->name('delete_multi');
    Route::post('product/{product}/delete_single', [ProductController::class, 'delete_single'])->name('delete_single');

    Route::resource('category', CategoryController::class);
    // Route::post('remove', [ProductController::class, 'remove'])->name('remove');
    // Route::post('product/add', [ProductController::class, 'store']);
    // Route::get('product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    // Route::put('product/update/{product}', [ProductController::class, 'update'])->name('product.update');
    // Route::delete('product/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('product/croup', function() {
        return view('backend.product.croup');
    });
});


