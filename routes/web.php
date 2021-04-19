<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ShippingController;


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


// Home Page Route
Route::get('/', [SiteController::class, 'index'])->name('home');
//Subscriber
Route::post('/subscriber', [CustomerController::class, 'Subscriber'])->name('Subscriber');
// Show All Product
Route::get('/all-products', [SiteController::class, 'Get_All_products'])->name('products');
// Product Load More Button
Route::post('/load-more-data', [SiteController::class, 'Load_More_Data'])->name('Load_More_Data');
// Product Single Product
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/{slug}/{slug2}/{slug3?}', [SiteController::class, 'get_products'])->name('products');
    Route::get('/{slug}', [SiteController::class, 'SingleProduct'])->name('SingleProduct');
    Route::get('/quick-view/{slug}', [SiteController::class, 'QuickViewProduct'])->name('quick.view');
});
Route::get('/quick/{quick}', [SiteController::class, 'QuickViewProduct'])->name('QuickViewProduct');


// Cart Add Product & Items
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/show', [CartController::class, 'index'])->name('show');
    Route::post('/add-item', [CartController::class, 'Store'])->name('add');
    Route::post('/item', [CartController::class, 'CheCkItems'])->name('item');
    Route::post('/remove-item', [CartController::class, 'destroy'])->name('destroy');
    Route::get('/clear', [CartController::class, 'clear'])->name('clear');
});


Route::prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', [CheckoutController::class, 'renderPage'])->name('index');
    Route::post('/shipping', [CheckoutController::class, 'ShippingStore'])->name('shipping');
    Route::get('/reviews', [ShippingController::class, 'review_payments'])->name('reviews_payments');
});

Route::post('/load-more/product', [SiteController::class, 'Load_More_product'])->name('Load_More_product');
Route::post('/product/search', [SiteController::class, 'Search'])->name('search');

// Customer Authentication Route Define
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [CustomerController::class, 'Render'])->name('login');
    Route::post('/login', [CustomerController::class, 'login'])->name('login');
    Route::post('/register', [CustomerController::class, 'register'])->name('register');
});

Route::prefix('customer')->name('customer.')->middleware('customer')->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [CustomerController::class, 'logout'])->name('logout');
});



