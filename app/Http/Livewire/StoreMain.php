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
        $exist = ShoppingCartStore::where('product_id', $id)->count();
        if($exist < 1){
            ShoppingCartStore::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
                'subtotal' => 0,
                'quantity' => 1
            ]);
        }else {
            $quantity = ShoppingCartStore::where('product_id', $id)->where('user_id', auth()->user()->id)->get('quantity')->first();
            ShoppingCartStore::where('product_id', $id)->update([
                'quantity' => $quantity['quantity'] + 1
            ]);
        }
        $this->emit('ShoppingCart:update');
    }
}
