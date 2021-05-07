<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingCart as ShoppingCartModel;


class ShoppingCart extends Component
{

    protected $listeners = [
        'ShoppingCart:update' => '$refresh',
    ];
    
    public function render()
    {
        return view('livewire.shopping-cart', [
            'shoppingItems' => ShoppingCartModel::where('user_id', Auth::id())->get(),
        ]);
    }

    public function ItemSum($product, $price) {
        $quantity = ShoppingCartModel::where('product_id', $product)->where('user_id', auth()->user()->id)->get('quantity')->first();
        $cantidad = $quantity['quantity'] + 1;
        $subtotal = $cantidad * $price;
        ShoppingCartModel::where('product_id', $product)->where('user_id', auth()->user()->id)->update([
            "quantity" => $cantidad,
            "subtotal" => $subtotal
        ]);
    }

    public function ItemRest($product, $price) {
        $quantity = ShoppingCartModel::where('product_id', $product)->where('user_id', auth()->user()->id)->get('quantity')->first();
        $cantidad = $quantity['quantity'] - 1;
        $subtotal = $cantidad * $price;
        if($quantity['quantity'] > 1){
            ShoppingCartModel::where('product_id', $product)->where('user_id', auth()->user()->id)->update([
                "quantity" => $cantidad,
                "subtotal" => $subtotal
            ]);
        }
    }
}
