<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmailController;
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
    Route::middleware(['role:Admin|Client'])->get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::middleware(['role:Admin|Client'])->post('checkout/confirm', 'FrontController@confirm')->name('confirm');
    Route::middleware(['role:Admin|Client'])->get('checkout', 'FrontController@checkout')->name('checkout');
    Route::middleware(['role:Admin|Client'])->get('checkout/payment', 'FrontController@payment')->name('payment');
    Route::middleware(['role:Admin'])->get('comments/list', 'commentsController@index')->name('comments.list');
    Route::middleware(['role:Super-Admin|Admin'])->get('wish/index','WishListController@index')->name('wishlist');
    /*Aqui empiezan las rutas de los banners*/
    Route::middleware(['role:Admin|'])->get('index/elements', 'ContentController@index')->name('content.list');
    Route::middleware(['role:Admin'])->get('first/create', 'ContentController@create1')->name('create_one');
    Route::middleware(['role:Admin'])->post('first/store', 'ContentController@storeone')->name('store_one');
    Route::middleware(['role:Admin'])->get('first/edit/{id}', 'ContentController@edit1')->name('edit_one');
    Route::middleware(['role:Admin'])->put('first/update/{id}', 'ContentController@update1')->name('update_one');
    Route::middleware(['role:Admin'])->get('second/create', 'ContentController@create2')->name('create_second');
    Route::middleware(['role:Admin'])->post('second/store', 'ContentController@store2')->name('store_second');

    Route::middleware(['role:Admin'])->post('third/store', 'ContentController@store3')->name('store_three');
    Route::middleware(['role:Admin'])->post('third/store', 'ContentController@store3')->name('store_three');


    Route::middleware(['role:Admin'])->get('reports/sales', 'ReportController@index2')->name('sales.index');
    Route::middleware(['role:Admin|Client'])->get('client/card', 'ClientController@card')->name('card.index');
    Route::middleware(['role:Admin|Client'])->get('client/street', 'ClientController@street')->name('street.index');
    Route::middleware(['role:Admin|Client'])->get('client/order', 'ClientController@order')->name('order.client');

    Route::middleware(['role:Super-Admin|Admin'])->get('client', 'ReportController@clients')->name('client');
    /*Aqui termina la ruta de los banners*/
    Route::middleware(['role:Admin'])->resource('products/category', CategoryProductController::class);
    Route::middleware(['role:Admin'])->resource('products', ProductController::class);
    Route::middleware(['role:Admin'])->resource('promotions', PromotionController::class);
    Route::middleware(['role:Admin'])->resource('inventory', InventoryProductController::class);
    Route::middleware(['role:Admin|Client'])->resource('delivery', DeliveryDataController::class);
    Route::middleware(['role:SAdmin'])->resource('color', 'ColoresController');
    Route::middleware(['role:Admin'])->resource('talla', TallaController::class);
    Route::middleware(['role:Admin'])->resource('comment', commentsController::class);

    //Route::resource('report/sales', ReportController::class);
    //Reports Resource
    Route::middleware(['role:Super-Admin|Admin'])->resource('report', ReportController::class);
    //Voucher resource
    Route::middleware(['role:Super-Admin|Admin'])->resource('voucher', VoucherController::class);
    //Cash Fund Resource
    Route::middleware(['role:Super-Admin|Admin'])->resource('cashfund', CashFundController::class);
    Route::middleware(['role:Super-Admin|Admin'])->get('contact/user/{id}', 'EmailController@create')->name('contact.create');

    Route::middleware(['role:Super-Admin|Admin'])->post('/contactar/{id}', 'EmailController@store')->name('contact.store');
    Route::middleware(['role:Super-Admin|Admin'])->get('orders/all','ClientController@index')->name('order.index');

//Route::put('orders/status/{id}','VoucherController@status')->name('order.status');
//Route::resource('status', 'ClientController');
   Route::middleware(['role:Super-Admin|Admin'])->put('orders/status/{id}','ClientController@edit')->name('status.edit');
    //Ruta que esta señalando nuestro formulario
});













// Productos agregados al carrito
