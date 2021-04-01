<?php

use App\Http\Controllers\Staff\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\staff\DashboardController;
use App\Http\Controllers\Staff\CategoryController;
use App\Http\Controllers\staff\ProductController;
use App\Http\Controllers\staff\SliderController;

Route::prefix('staff')->name('staff.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Brand Route Define
    Route::prefix('/brand')->name('brand.')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('index');
        Route::get('/create-brand', [BrandController::class, 'create'])->name('create');
        Route::post('/create-brand', [BrandController::class, 'store'])->name('store');
        Route::get('/edit-brand/{id}', [BrandController::class, 'edit'])->name('edit');
        Route::put('/edit-brand/{id}', [BrandController::class, 'update'])->name('update');
        Route::post('/delete-brand/{id}', [BrandController::class, 'destroy'])->name('destroy');
        Route::post('/status-brand/{id}/{status}', [BrandController::class, 'StatusChange'])->name('status');
    });
    // Category Route Define
    Route::prefix('/category')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/create', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/edit-category/{id}', [CategoryController::class, 'update'])->name('update');
        Route::post('/status-category/{id}/{status}', [CategoryController::class, 'ChangeStatus'])->name('status');
        Route::post('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });
    // Product Route Define
    Route::prefix('/product')->name('product.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/create', [ProductController::class, 'store'])->name('store');
        Route::post('/product-destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');
        Route::post('/status-product/{id}/{status}', [ProductController::class, 'ChangeStatus'])->name('status');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [ProductController::class, 'update'])->name('update');
        Route::post('/fetch-data', [ProductController::class, 'fetchData'])->name('fetchData');
        Route::post('/price/update', [ProductController::class, 'PriceUpdate'])->name('PriceUpdate');
        Route::post('/feature/product/', [ProductController::class, 'feature'])->name('feature');
        Route::post('/feature', [ProductController::class, 'featureProduct'])->name('featureProduct');
        Route::post('/Change/delete/', [ProductController::class, 'MultiItemsDelete'])->name('MultiItemsDelete');
        Route::post('/Change/status/active', [ProductController::class, 'MultiItemsActive'])->name('MultiItemsActive');
        Route::post('/Change/status/inactive', [ProductController::class, 'MultiItemsInactive'])->name('MultiItemsInactive');
    });

    Route::prefix('/sliders')->name('slider.')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('index');
        Route::get('/create', [SliderController::class, 'create'])->name('create');
        Route::post('/create', [SliderController::class, 'store'])->name('store');
        Route::get('/status{}', [SliderController::class, 'status']);
        Route::post('/status-slider/{id}/{status}', [SliderController::class, 'StatusChange'])->name('status');
    });

});
