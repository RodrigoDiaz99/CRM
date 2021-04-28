<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ShoppingCart as ShoppingCartModel;
use Illuminate\Support\Facades\Auth;

class ShoppingCart extends Component
{

    public function render()
    {
        return view('livewire.shopping-cart', [
            'shoppingItems' => ShoppingCartModel::where('user_id', Auth::id())->get(),
        ]);
    }

    public function AddItem($product) {
        ShoppingCartModel::create([
            "user_id" => auth()->user()->id,
            "product_id" => $product,
            "quantity" => 1
        ]);
    }
}
