<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ShoppingCart as ShoppingCartStore;

class Shop extends Component
{
    public function render()
    {
        return view('livewire.shop', [
            'productos' => Product::all(),
        ]);
    }

    public function AddItem($id) {
        ShoppingCartStore::create([
            'user_id' => auth()->user()->id,
            'product_id' => $id,
            'quantity' => 1
        ]);
        $this->emit('ShoppingCart:update');
    }
}
