<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {

        $product = Product::find($request->id);

        Cart::add(
            $product->id,
            $product->name,
            1,


        );
        return back()->with('success', "$product->name ¡se ha agregado con éxito al carrito!");
    }

    public function cart()
    {

        return view('checkout');
    }

    public function removeitem(Request $request)
    {
        //$producto = Producto::where('id', $request->id)->firstOrFail();
        Cart::remove([
            'id' => $request->id,
        ]);
        return back()->with('success', "Producto eliminado con éxito de su carrito.");
    }

    public function clear()
    {
        Cart::clear();
        return back()->with('success', "The shopping cart has successfully beed added to the shopping cart!");
    }
}
