<?php

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

/*Route::get('/', function () {
    return view('welcome');
})->name('welcome');*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', 'FrontController@index')->name('welcome');

Route::post('comments', 'FrontController@storeComment')->name('storeComment');
Route::get('product/info/{id}', 'FrontController@show')->name('details.show');
Route::post('checkout/confirm', 'FrontController@confirm')->name('confirm');

Route::get('product/addShopingCart/{id}', 'FrontController@addShopingCart')->name('addShopingCart');
Route::get('checkout', 'FrontController@checkout')->name('checkout');
Route::get('checkout/payment', 'FrontController@payment')->name('payment');

/*  */
Route::resource('products/category', CategoryProductController::class);
Route::resource('products', ProductController::class);
Route::resource('promotions', PromotionController::class);
Route::resource('inventory', InventoryProductController::class);
Route::resource('delivery', DeliveryDataController::class);
Route::get('reports/sales','ReportController@index2')->name('sales.index');
//Route::resource('report/sales', ReportController::class);
//Reports Resource
Route::resource('report', ReportController::class);
//Voucher resource
Route::resource('voucher', VoucherController::class);
//Cash Fund Resource
Route::resource('cashfund', CashFundController::class);












// Productos agregados al carrito
