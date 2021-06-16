<?php

namespace App\Http\Livewire;

use App\Models\InventoryProduct;
use Livewire\Component;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\ShoppingCart as ShoppingCartStore;
use App\Models\ProductList;

class StoreMain extends Component
{
    public function render()
    {
        return view('livewire.store-main', [
            'products' => Product::all(),
        ]);
    }

    public function AddItem($id)
    {
        $ShoppingCartExists = ShoppingCartStore::exists();
        $LastUserShoppingCartExists = ShoppingCartStore::where('user_id', auth()->user()->id)->exists();
        $LastSoppingCarts = ShoppingCartStore::latest();
        $LastUserShoppingCart = ShoppingCartStore::where('user_id', auth()->user()->id)->latest()->get()->first();
        $price = InventoryProduct::where('product_id', $id)->get('sale_price')->first(); // Obtenemos el precio del producto

        if ($ShoppingCartExists == false) {
            ProductList::create([
                'product_id' => $id,
                'quantity' => 1,
                'price' => $price->sale_price,
                'subtotal' => $price->sale_price,
                'list_id' => '1'

            ]);

            ShoppingCartStore::create([
                'user_id' => auth()->user()->id,
                'list_id' => '1',
                'finished' => false

            ]);
        } else if ($LastUserShoppingCartExists == false) {
            $ProductListLastID = $LastSoppingCarts->first()->list_id + 1;

            ProductList::create([
                'product_id' => $id,
                'quantity' => 1,
                'price' => $price->sale_price,
                'subtotal' => $price->sale_price,
                'list_id' => $ProductListLastID,

            ]);

            ShoppingCartStore::create([
                'user_id' => auth()->user()->id,
                'list_id' => $ProductListLastID,
                'finished' => false

            ]);
        } else if ($LastUserShoppingCart->finished == true) {
            $ProductListLastID = $LastSoppingCarts->first()->list_id + 1;
            ProductList::create([
                'product_id' => $id,
                'quantity' => 1,
                'price' => $price->sale_price,
                'subtotal' => $price->sale_price,
                'list_id' => $ProductListLastID,

            ]);

            ShoppingCartStore::create([
                'user_id' => auth()->user()->id,
                'list_id' => $ProductListLastID,
                'finished' => false

            ]);

            $promotion = Promotion::where('product_id', $id)->get('product_id', 'cash_discount', 'expiration_date')->first(); // Obtenemos la promocion de cada producto

            if ($promotion != null) {
                $dia = date("d");
                $mes = date("m");
                $año = date("y");

                $expiration = explode('-', $promotion['expiration_date']);

                $producId = ShoppingCartStore::latest('id')->first();

                if(($expiration[2] <= $dia) && ($expiration[1] <= $mes) && ($año[0] <= $año)){
                    $discount = ($sale_price * $cash_discount) / 100;
                    $sale_price = $sale_price - $discount;

                    ShoppingCart::where('id', $producId->id)->update([
                        'price' => $price->sale_price
                    ]);

                }else{
                   //NOTING
                }
            }
        } else {

            $CheckIfProductExists = ProductList::where('product_id', $id)->where('list_id',  $LastUserShoppingCart->list_id)->exists();
            $quantity = ProductList::where('product_id', $id)->where('list_id',  $LastUserShoppingCart->list_id)->get()->first();
            if ($CheckIfProductExists == false) {

                ProductList::create([
                    'product_id' => $id,
                    'quantity' => 1,
                    'price' => $price->sale_price,
                    'subtotal' => $price->sale_price,
                    'list_id' => $LastUserShoppingCart->list_id,

                ]);
            } else {
                $subtotal = ($quantity->quantity + 1) * $price->sale_price; // Calculamos el subtotal por producto

                $quantity->update([
                    'quantity' => $quantity->quantity + 1,
                    'subtotal' => $subtotal
                ]);
            }
        }
        $this->emit('ShoppingCart:update');
    }
}
