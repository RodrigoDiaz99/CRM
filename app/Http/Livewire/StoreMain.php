<?php

namespace App\Http\Livewire;

use App\Models\InventoryProduct;
use Livewire\Component;
use App\Models\Product;
use App\Models\Promotion;
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
        $price = InventoryProduct::where('product_id', $id)->get('sale_price')->first(); // Obtenemos el precio del producto

        if($exist < 1){

            ShoppingCartStore::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
                'quantity' => 1,
                'price' => $price->sale_price,
                'subtotal' => $price->sale_price
            ]);

            $promotion = Promotion::where('product_id', $id)->get('product_id', 'cash_discount', 'expiration_date')->first(); // Obtenemos la promocion de cada producto

            if($promotion != null){
                $dia = date("d");
                $mes = date("m");
                $año = date("y");

                $expiration = explode('-', $promotion['expiration_date']);

                if(($expiration[2] <= $dia) && ($expiration[1] <= $mes) && ($año[0] <= $año)){
                    $discount = ($sale_price*$cash_discount)/100;
                    $sale_price = $sale_price - $discount;

                    ShoppingCart::where('id', $id->id)->update([
                        'price' => $price->sale_price
                        ]); 
                }else{
                    ShoppingCart::where('id', $id->id)->update([
                        'price' => $price->sale_price
                    ]);

                }
            }

        }else {
            $quantity = ShoppingCartStore::where('product_id', $id)->where('user_id', auth()->user()->id)->get('quantity')->first();

            $subtotal = ($quantity['quantity'] + 1)* $price->sale_price; // Calculamos el subtotal por producto

            ShoppingCartStore::where('product_id', $id)->update([
                'quantity' => $quantity['quantity'] + 1,
                'subtotal' => $subtotal
            ]);
        }
        $this->emit('ShoppingCart:update');
    }
}
