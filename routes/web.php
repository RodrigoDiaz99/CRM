<?php

use App\Models\CashFund;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('products/category', CategoryProductController::class);

Route::resource('products', ProductController::class);

Route::resource('promotions', PromotionController::class);
Route::resource('inventory', InventoryProductController::class);

//Cash Fund Resource
Route::resource('cashfund', CashFundController::class);
