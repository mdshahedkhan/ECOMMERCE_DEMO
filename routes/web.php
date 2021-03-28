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
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/{slug}/{slug2}/{slug3?}', [SiteController::class, 'get_products'])->name('products');
    Route::get('/{slug}', [SiteController::class, 'SingleProduct'])->name('SingleProduct');
    Route::post('/quick/view/{slug}', [SiteController::class, 'quickView'])->name('quick.view');
});

