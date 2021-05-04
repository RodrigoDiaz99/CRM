<?php

use App\Models\bannerone;
use App\Models\bannerthree;
use App\Models\bannertwo;
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

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


$content1 = bannerone::orderBy('id', 'desc')->get()->take(1);
$content2 = bannertwo::orderBy('id', 'desc')->get()->take(1);
$content3 = bannerthree::orderBy('id', 'desc')->get()->take(1);

Route::get('/', 'FrontController@index',compact('content1','content2','content3'))->name('welcome');


Route::get('shop', 'FrontController@shop')->name('shop');
Route::get('contact', 'FrontController@contact')->name('contact');
Route::post('comments', 'FrontController@storeComment')->name('storeComment');
Route::get('product/info/{id}', 'FrontController@show')->name('details.show');
Route::post('checkout/confirm', 'FrontController@confirm')->name('confirm');
Route::post('contact/store', 'FrontController@sendEmail')->name('contact_send');
Route::post('contact', 'FrontController@contact')->name('contact');
Route::get('product/addShopingCart/{id}', 'FrontController@addShopingCart')->name('addShopingCart');
Route::get('checkout', 'FrontController@checkout')->name('checkout');
Route::get('checkout/payment', 'FrontController@payment')->name('payment');
Route::get('comments/list', 'commentsController@index')->name('comments.list');
/*Aqui empiezan las rutas de los banners*/
Route::get('index/elements', 'ContentController@index')->name('content.list');
Route::get('first/create', 'ContentController@create1')->name('create_one');
Route::post('first/store', 'ContentController@storeone')->name('store_one');
Route::post('first/edit/{id}', 'ContentController@edit1')->name('edit_one');
Route::post('first/update', 'ContentController@update1')->name('update_one');

Route::get('second/create', 'ContentController@create2')->name('create_second');
Route::post('second/store', 'ContentController@store2')->name('store_second');
Route::post('first/store', 'ContentController@storeone')->name('store_one');
Route::post('first/store', 'ContentController@storeone')->name('store_one');

Route::get('third/create', 'ContentController@create3')->name('create_three');
Route::post('third/store', 'ContentController@store3')->name('store_three');
Route::post('first/store', 'ContentController@storeone')->name('store_one');
Route::post('first/store', 'ContentController@storeone')->name('store_one');
/*Aqui termina la ruta de los banners*/
Route::resource('products/category', CategoryProductController::class);
Route::resource('products', ProductController::class);
Route::resource('promotions', PromotionController::class);
Route::resource('inventory', InventoryProductController::class);
Route::resource('delivery', DeliveryDataController::class);
Route::get('reports/sales', 'ReportController@index2')->name('sales.index');
//Route::resource('report/sales', ReportController::class);
//Reports Resource
Route::resource('report', ReportController::class);
//Voucher resource
Route::resource('voucher', VoucherController::class);
//Cash Fund Resource
Route::resource('cashfund', CashFundController::class);












// Productos agregados al carrito
