<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fronted\SiteController;

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

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/all-products', [SiteController::class, 'Get_All_products'])->name('products');
Route::post('/load-more-data', [SiteController::class, 'Load_More_Data'])->name('Load_More_Data');
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/{slug}/{slug2}/{slug3?}', [SiteController::class, 'get_products'])->name('products');
    Route::get('/{slug}', [SiteController::class, 'SingleProduct'])->name('SingleProduct');
    Route::get('/quick-view/{slug}', [SiteController::class, 'QuickViewProduct'])->name('quick.view');
});


Route::get('/quick/{quick}', [SiteController::class, 'QuickViewProduct'])->name('QuickViewProduct');

