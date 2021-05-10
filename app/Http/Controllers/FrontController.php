<?php

namespace App\Http\Controllers;

use App\Models\InventoryProduct;
use App\Models\ScoreProduct;
use App\Models\Product;
use App\Models\CommentProduct;
use App\Http\Requests\CommentStore;
use App\Models\DeliveryData;

use App\Models\ShoppingCart;
use App\Http\Controllers\VoucherController;
use App\Models\ShoppingCart as Shopping;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\ContactMail;

use App\Models\bannerone;
use App\Models\bannerthree;
use App\Models\bannertwo;
use MercadoPago;

class FrontController extends Controller
{

    public function index()
    {
        $price = InventoryProduct::orderBy('sale_price', 'desc')->get();
        $productos = Product::orderBy('id', 'desc')->get()->take(1);

        $content1 = bannerone::orderBy('id', 'desc')->get()->take(1);
        $content2 = bannertwo::orderBy('id', 'desc')->get()->take(1);
        $content3 = bannerthree::orderBy('id', 'desc')->get()->take(1);

        return view('welcome', compact('productos', 'price','content1','content2','content3'));
    }

    public function show($id)
    {
        $productos = Product::find($id);
        $price = InventoryProduct::orderBy('sale_price', 'desc')->get();
        $comment_products = CommentProduct::orderBy('comment')->get();
        return view('store.product-detail', compact('productos', 'price', 'comment_products'));
    }

    public function indexComment()
    {
        $comment_products = CommentProduct::all();
        return view('store.product-detail', compact('comments'));
    }

    public function createComment()
    {
        $products = Product::orderBy('name', 'ASC')->get();
    }

    public function storeComment(CommentStore $request)
    {
        $comment_products = new CommentProduct();
        $comment_products->comment = $request->comment;
        $comment_products->product_id = $request->product_id;
        $comment_products->user_id = auth()->user()->id;
        $comment_products->save();
        return back();
        return view('store.product-detail', compact('productos', 'price'));
    }

    public function checkout()
    {
        $ShoppingCart = Shopping::where('user_id', auth()->user()->id)->get();
        return view('store.checkout', compact('ShoppingCart'));
    }

    public function payment()
    {
        $ShoppingCart = Shopping::where('user_id', auth()->user()->id)->get();
        return view('store.payment', compact('ShoppingCart'));
    }

    public function contact()
    {
        $shopingItems = Shopping::where('user_id', auth()->user()->id)->get();
        return view('store.contact', compact('shopingItems'));
    }

    public function confirm(Request $request)
    {
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

        $this->saveScore();
        $voucher = new VoucherController();
        $voucher->store($request);

        echo json_encode($response);

        // Datos de nuestra vista
        $item = $request->all();

        return view('store.confirm', compact('response'));
    }

    public function generateVoucher()
    {
        // TODO
    }

    public function saveScore()
    {
        $cart = Shopping::where('user_id', auth()->user()->id)->get();

        foreach ($cart as $row) {
            $score = new ScoreProduct();
            $score->user_id = $row->user_id;

            if ($actualRow = ScoreProduct::where('product_id', $row->product_id)->first() != null) {
                $actualRow = ScoreProduct::where('product_id', $row->product_id)->first();
                $this->updateScore($actualRow->id);
            } else {
                $score->product_id = $row->product_id;
                $score->total = 1;
                $score->save();
            }
        }
    }

    public function updateScore($id)
    {
        $score = ScoreProduct::find($id);
        $scoreSum = $score->total + 1;
        $score->where('id', $id)->update([
            'total' => $scoreSum,
        ]);
    }

    public function addShopingCart($id, Request $request)
    {
        if (Auth::check()) {
            Shopping::create([
                "user_id" => auth()->user()->id,
                "product_id" => $id,
                "quantity" => 1
            ]);

            return redirect()->back();
        } else {
            //$this->middleware('authrnticate');
        }
    }

    public function shop()
    {
        $productos = Product::all();
        $price = InventoryProduct::orderBy('sale_price', 'desc')->get();
        $shopingItems = Shopping::where('user_id', auth()->user()->id)->get();
        return view('store.shop', compact('productos', 'price', 'shopingItems'));
    }

    public function sendEmail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'msg' => $request->msg,
        ];

        //en teoria todo esta bien jajaj algo tienes mal movido xdxd
        Mail::to('contacto@armyprolife.com')->send(new ContactMail($details));
        return back()->with('Mensaje Enviado', 'Tu mensaje se envio con exito!');
    }

    public function index_element(){


    }
}
