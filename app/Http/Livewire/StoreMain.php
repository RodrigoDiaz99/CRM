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

        /* 
        1. Comprobar si hay carritos abiertos o existentes relacionado con id de usuario
        2. Si no existen para el usuario o está cerrado, crear nuevo carrito.
        3. Agregar productos al carrito.
        4. En confirm de venta, marcar como cerrado el carrito.
            4.1. Modificar lista del carrito solo mostrar el último del usuario si está abierto.
         */

        

        $exist = ProductList::where('product_id', $id)->count();
        $price = InventoryProduct::where('product_id', $id)->get('sale_price')->first(); // Obtenemos el precio del producto

        if ($exist < 1) {

            ShoppingCartStore::create([
                'user_id' => auth()->user()->id,
            ]);

            ProductList::create([

                'product_id' => $id,
                'quantity' => 1,
                'price' => $price->sale_price,
                'subtotal' => $price->sale_price
            ]);

            $promotion = Promotion::where('product_id', $id)->get('product_id', 'cash_discount', 'expiration_date')->first(); // Obtenemos la promocion de cada producto

            if ($promotion != null) {
                $dia = date("d");
                $mes = date("m");
                $año = date("y");

                $expiration = explode('-', $promotion['expiration_date']);

                if (($expiration[2] <= $dia) && ($expiration[1] <= $mes) && ($año[0] <= $año)) {
                }
            }
        } else {
            $quantity = ProductList::where('product_id', $id)->where('user_id', auth()->user()->id)->get('quantity')->first();

            $subtotal = ($quantity['quantity'] + 1) * $price->sale_price; // Calculamos el subtotal por producto

            ProductList::where('product_id', $id)->update([
                'quantity' => $quantity['quantity'] + 1,
                'subtotal' => $subtotal
            ]);
        }
        $this->emit('ProductList:update');
    }
}
