<?php

namespace App\Http\Controllers;

use App\Models\InventoryProduct;
use Illuminate\Http\Request;

use App\Models\Product;
class FrontController extends Controller
{
    public function index(){

        $productos    =   Product::all();
        $price = InventoryProduct::orderBy('sale_price', 'desc')->get();
        return view('welcome',compact('productos','price'));

    }
    public function show($id){
        $productos    =   Product::find($id);
        $price = InventoryProduct::orderBy('sale_price', 'desc')->get();
        return view('store.product-detail',compact('productos','price'));

    }
    public function checkout(){
        return view('store.checkout');
    }
}
