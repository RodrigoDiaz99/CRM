<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingCart as ShoppingCartModel;


class ShoppingCart extends Component
{

    protected $listeners = ['postAdded' => 'AddItem'];
    
    public function render()
    {
        return view('livewire.shopping-cart', [
            'shoppingItems' => ShoppingCartModel::where('user_id', Auth::id())->get(),
        ]);
    }

    public function ItemSum($product) {
        $quantity = ShoppingCartModel::where('product_id', '1')->where('user_id', auth()->user()->id)->get('quantity')->first();
        ShoppingCartModel::where('product_id', $product)->where('user_id', auth()->user()->id)->update([
            "quantity" => $quantity['quantity'] + 1
        ]);
    }

    public function ItemRest($product) {
        $quantity = ShoppingCartModel::where('product_id', '1')->where('user_id', auth()->user()->id)->get('quantity')->first();
        if($quantity['quantity'] > 1){
            ShoppingCartModel::where('product_id', $product)->where('user_id', auth()->user()->id)->update([
                "quantity" => $quantity['quantity'] - 1
            ]);
        }
    }
}
