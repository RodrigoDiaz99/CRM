<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\ShoppingCart as ShoppingCartStore;

class StoreMain extends Component
{
    public function render()
    {
        return view('livewire.store-main', [
            'products' => Product::all(),
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
