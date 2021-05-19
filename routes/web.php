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
    Route::middleware(['role:Super-Admin|Admin'])->get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::middleware(['role:Super-Admin|Admin|User'])->post('checkout/confirm', 'FrontController@confirm')->name('confirm');
    Route::middleware(['role:Super-Admin|Admin|User'])->get('checkout', 'FrontController@checkout')->name('checkout');
    Route::middleware(['role:Super-Admin|Admin|User'])->get('checkout/payment', 'FrontController@payment')->name('payment');
    Route::middleware(['role:Super-Admin|Admin'])->get('comments/list', 'commentsController@index')->name('comments.list');
    /*Aqui empiezan las rutas de los banners*/
    Route::middleware(['role:Super-Admin|Admin|'])->get('index/elements', 'ContentController@index')->name('content.list');
    Route::middleware(['role:Super-Admin|Admin'])->get('first/create', 'ContentController@create1')->name('create_one');
    Route::middleware(['role:Super-Admin|Admin'])->post('first/store', 'ContentController@storeone')->name('store_one');
    Route::middleware(['role:Super-Admin|Admin'])->get('first/edit/{id}', 'ContentController@edit1')->name('edit_one');
    Route::middleware(['role:Super-Admin|Admin'])->put('first/update/{id}', 'ContentController@update1')->name('update_one');
    Route::middleware(['role:Super-Admin|Admin'])->get('second/create', 'ContentController@create2')->name('create_second');
    Route::middleware(['role:Super-Admin|Admin'])->post('second/store', 'ContentController@store2')->name('store_second');

    Route::middleware(['role:Super-Admin|Admin'])->post('third/store', 'ContentController@store3')->name('store_three');
    Route::middleware(['role:Super-Admin|Admin'])->post('third/store', 'ContentController@store3')->name('store_three');


    Route::middleware(['role:Super-Admin|Admin'])->get('reports/sales', 'ReportController@index2')->name('sales.index');
    Route::middleware(['role:Super-Admin|Admin|User'])->get('client/card', 'ClientController@card')->name('card.index');
    Route::middleware(['role:Super-Admin|Admin|User'])->get('client/street', 'ClientController@street')->name('street.index');
    Route::middleware(['role:Super-Admin|Admin|User'])->get('client/order', 'ClientController@order')->name('order.index');

    Route::middleware(['role:Super-Admin|Admin'])->get('client', 'ReportController@clients')->name('client');
    /*Aqui termina la ruta de los banners*/
    Route::middleware(['role:Super-Admin|Admin'])->resource('products/category', CategoryProductController::class);
    Route::middleware(['role:Super-Admin|Admin'])->resource('products', ProductController::class);
    Route::middleware(['role:Super-Admin|Admin'])->resource('promotions', PromotionController::class);
    Route::middleware(['role:Super-Admin|Admin'])->resource('inventory', InventoryProductController::class);
    Route::middleware(['role:Super-Admin|Admin'])->resource('delivery', DeliveryDataController::class);
    Route::middleware(['role:Super-Admin|Admin'])->resource('color', 'ColoresController');
    Route::middleware(['role:Super-Admin|Admin'])->resource('talla', TallaController::class);
    Route::middleware(['role:Super-Admin|Admin'])->resource('comment', commentsController::class);

    //Route::resource('report/sales', ReportController::class);
    //Reports Resource
    Route::middleware(['role:Super-Admin|Admin'])->resource('report', ReportController::class);
    //Voucher resource
    Route::middleware(['role:Super-Admin|Admin'])->resource('voucher', VoucherController::class);
    //Cash Fund Resource
    Route::middleware(['role:Super-Admin|Admin'])->resource('cashfund', CashFundController::class);
});













// Productos agregados al carrito
