<?php

namespace App\Http\Controllers;

use App\Models\InventoryProduct;
use App\Models\Product;
use App\Models\ShopingCart;

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
        return view('store.product-detail',compact('productos', 'price'));
    }

    public function checkout(){
        return view('store.checkout');
    }

    public function addShopingCart ($id) {
        ShopingCart::create([
            "user_id" => auth()->user()->id,
            "product_id" => $id
        ]);

        return redirect()->back();
    }
}
