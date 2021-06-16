<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InventoryProduct;
use Illuminate\Support\Facades\Hash;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = InventoryProduct::create([
            'product_id' => '1',
            'total_count' => '5',
            'purchase_price' => '25',
            'percent_of_profit' => '25',
            'sale_price' => '39',
            'cost_of_shipping' => '55',


        ]);
    }
}
