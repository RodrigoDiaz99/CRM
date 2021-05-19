<?php

use App\Models\CommentProduct;
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


/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/


Route::get('/', 'FrontController@index')->name('welcome');
Route::get('product/addShopingCart/{id}', 'FrontController@addShopingCart')->name('addShopingCart');
Route::post('contact/store', 'FrontController@sendEmail')->name('contact_send');
Route::get('shop', 'FrontController@shop')->name('shop');
Route::get('contact', 'FrontController@contact')->name('contact');
Route::post('comments', 'FrontController@storeComment')->name('storeComment');
Route::get('product/info/{id}', 'FrontController@show')->name('details.show');
Route::post('contact', 'FrontController@contact')->name('contact');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::post('checkout/confirm', 'FrontController@confirm')->name('confirm');
    Route::get('checkout', 'FrontController@checkout')->name('checkout');
    Route::get('checkout/payment', 'FrontController@payment')->name('payment');
    Route::get('comments/list', 'commentsController@index')->name('comments.list');
    /*Aqui empiezan las rutas de los banners*/
    Route::get('index/elements', 'ContentController@index')->name('content.list');
    Route::get('first/create', 'ContentController@create1')->name('create_one');
    Route::post('first/store', 'ContentController@storeone')->name('store_one');
    Route::get('first/edit/{id}', 'ContentController@edit1')->name('edit_one');
    Route::put('first/update/{id}', 'ContentController@update1')->name('update_one');
    Route::get('second/create', 'ContentController@create2')->name('create_second');
    Route::post('second/store', 'ContentController@store2')->name('store_second');

    Route::post('third/store', 'ContentController@store3')->name('store_three');
    Route::post('third/store', 'ContentController@store3')->name('store_three');


    Route::get('reports/sales', 'ReportController@index2')->name('sales.index');
    Route::get('client/card', 'ClientController@card')->name('card.index');
    Route::get('client/street', 'ClientController@street')->name('street.index');
    Route::get('client/order', 'ClientController@order')->name('order.index');

    Route::get('client', 'ReportController@clients')->name('client');
    /*Aqui termina la ruta de los banners*/
    Route::resource('products/category', CategoryProductController::class);
    Route::resource('products', ProductController::class);
    Route::resource('promotions', PromotionController::class);
    Route::resource('inventory', InventoryProductController::class);
    Route::resource('delivery', DeliveryDataController::class);
    Route::resource('color', 'ColoresController');
    Route::resource('talla', TallaController::class);
    Route::resource('comment', commentsController::class);

    //Route::resource('report/sales', ReportController::class);
    //Reports Resource
    Route::resource('report', ReportController::class);
    //Voucher resource
    Route::resource('voucher', VoucherController::class);
    //Cash Fund Resource
    Route::resource('cashfund', CashFundController::class);
});













// Productos agregados al carrito
