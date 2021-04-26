<?php

namespace App\Http\Controllers;

use App\Models\InventoryProduct;

use App\Models\Product;
use App\Models\ShopingCart;
use App\Models\CommentProduct;

class FrontController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $productos = Product::all();
        $price = InventoryProduct::orderBy('sale_price', 'desc')->get();
        $shopingItems = ShopingCart::where('user_id', auth()->user()->id)->get();
        return view('welcome', compact('productos','price', 'shopingItems'));
    }

    public function show($id) {
        $productos = Product::find($id);
        $price = InventoryProduct::orderBy('sale_price', 'desc')->get();
        $comment_products = CommentProduct::find($id);
        return view('store.product-detail',compact('productos', 'price', 'comment_products'));
    }

    public function indexComment(){
        $comment_products = CommentProduct::all();
        return view('store.product-detail', compact('comments'));
    }

    public function createComment(){
        $products = Product::orderBy('name','ASC')->get();
    }

    public function storeComment(CommentStore $request){
        $comment_products = new CommentProduct();
        $comment_products->comment = $request->comment; 
        $comment_products->product_id = $request->product_id;
        $comment_products->user_id = auth()->user()->id;
        $comment_products->save();
        return redirect()->route('promotions.index');
    }

    public function checkout(){
        return view('store.checkout');
    }
    
    public function payment(){
        return view('store.payment');
    }

    public function addShopingCart ($id) {
        
        ShopingCart::create([
            "user_id" => auth()->user()->id,
            "product_id" => $id,
            "sum" => 1
        ]);

        return redirect()->back();
    }
}
