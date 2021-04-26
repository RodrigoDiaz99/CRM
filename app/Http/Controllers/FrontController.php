<?php

namespace App\Http\Controllers;

use App\Models\InventoryProduct;

use App\Models\Product;
use App\Models\ShoppingCart;
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
        return view('store.checkout');
    }
    
    public function payment(){
        return view('store.payment');
    }

    public function confirm() {
        echo "Prueba";
        MercadoPago\SDK::setAccessToken("config('mercadopago.test.token')");

            $payment = new MercadoPago\Payment();
            $payment->transaction_amount = (float)$_POST['transactionAmount'];
            $payment->token = $_POST['token'];
            $payment->description = $_POST['description'];
            $payment->installments = (int)$_POST['installments'];
            $payment->payment_method_id = $_POST['paymentMethodId'];
            $payment->issuer_id = (int)$_POST['issuer'];

            $payer = new MercadoPago\Payer();
            $payer->email = $_POST['email'];
            $payer->identification = array(
                "type" => $_POST['docType'],
                "number" => $_POST['docNumber']
            );
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
