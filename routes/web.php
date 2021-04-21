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

Route::resource('products/category', CategoryProductController::class);

Route::resource('products', ProductController::class);

Route::resource('promotions', PromotionController::class);
Route::resource('inventory', InventoryProductController::class);

Route::get('/', 'FrontController@index' )->name('welcome');
Route::get('product/info/{id}', 'FrontController@show' )->name('details.show');
Route::get('product/addShopingCart/{id}', 'FrontController@addShopingCart' )->name('addShopingCart');
Route::get('checkout', 'FrontController@checkout')->name('checkout');
