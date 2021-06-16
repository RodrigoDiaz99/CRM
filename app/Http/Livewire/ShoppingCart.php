<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingCart as ShoppingCartModel;
use App\Models\ProductList;

class ShoppingCart extends Component
{

    protected $listeners = [
        'ShoppingCart:update' => '$refresh',
    ];

    public function render()
    {
        if (Auth::check()) {
            $LastUserShoppingCart = ShoppingCartModel::where('user_id', auth()->user()->id)->where('finished', 0)->latest();
            if ($LastUserShoppingCart->exists() == true) {
                return view('livewire.shopping-cart', [
                    'shoppingItems' => ProductList::where('list_id',  $LastUserShoppingCart->first()->list_id)->get(),
                ]);
            } else {
                return view('livewire.shopping-cart', [
                    'shoppingItems' => [],
                ]);
            }
        } else {
            return view('livewire.shopping-cart');
        }
    }

    public function ItemSum($product)
    {
        $LastUserShoppingCart = ShoppingCartModel::where('user_id', auth()->user()->id)->latest();
        $quantity = ProductList::where('product_id', $product)->where('list_id',  $LastUserShoppingCart->first()->list_id)->get()->first();

        $cantidad = $quantity->quantity + 1;

        $subtotal = $cantidad * $quantity->price;

        $quantity->update([
            'quantity' => $quantity->quantity + 1,
            'subtotal' => $subtotal
        ]);
    }

    public function ItemRest($product)
    {
        $LastUserShoppingCart = ShoppingCartModel::where('user_id', auth()->user()->id)->latest();
        $quantity = ProductList::where('product_id', $product)->where('list_id',  $LastUserShoppingCart->first()->list_id)->first();

        $cantidad = $quantity->quantity - 1;

        $resta = $quantity->subtotal - $quantity->price;

        if ($quantity['quantity'] > 1) {
            ShoppingCartModel::where('product_id', $product)->where('user_id', auth()->user()->id)->update([
                "quantity" => $cantidad,
                "subtotal" => $resta
            ]);
        } else {
            ShoppingCartModel::where('product_id', $product)->where('user_id', auth()->user()->id)->delete();
        }
    }
}
