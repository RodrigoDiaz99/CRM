<?php

namespace App\Http\Controllers;

use App\Models\InventoryProduct;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use MercadoPago;

class FrontController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $productos = Product::all();
        $price = InventoryProduct::orderBy('sale_price', 'desc')->get();
        $shopingItems = ShoppingCart::where('user_id', auth()->user()->id)->get();
        return view('welcome', compact('productos','price', 'shopingItems'));
    }

    public function show($id) {
        $productos = Product::find($id);
        $price = InventoryProduct::orderBy('sale_price', 'desc')->get();
        return view('store.product-detail',compact('productos', 'price'));
    }

    public function checkout(){
        $ShoppingCart = ShoppingCart::where('user_id', auth()->user()->id)->get();
        return view('store.checkout', compact('ShoppingCart'));
    }
    
    public function payment(){
        return view('store.payment');
    }

    public function confirm(Request $request) {
        MercadoPago\SDK::setAccessToken("TEST-4942454312390960-042305-71f6bc0c8296d5b0bd38a38ec629d27b-235007960");

        $payment = new MercadoPago\Payment();
        $payment->token = $request->MPHiddenInputToken;
        $payment->transaction_amount = (float)$request->MPHiddenInputAmount;
        $payment->installments = (int)$request->installments;
        $payment->payment_method_id = $request->MPHiddenInputPaymentMethod;
        
        //$payment->description = $_POST['description'];
        //$payment->issuer_id = (int)$_POST['issuer'];

        $payer = new MercadoPago\Payer();
        $payer->email = $request->cardholderEmail;
        /*$payer->identification = array(
            "type" => $_POST['docType'],
            "number" => $_POST['docNumber']
        );*/
        $payment->payer = $payer;

        $payment->save();

        $response = array(
            'status' => $payment->status,
            'status_detail' => $payment->status_detail,
            'id' => $payment->id
        );
        echo json_encode($response);
    }

    public function addShopingCart ($id) {
        
        ShoppingCart::create([
            "user_id" => auth()->user()->id,
            "product_id" => $id,
            "sum" => 1
        ]);

        return redirect()->back();
    }
}
