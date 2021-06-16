<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = Product::create([
            'name' => 'Coca-Cola',
            'img_paths' => 'https://d29nyx213so7hn.cloudfront.net/media/catalog/product/cache/9376f1eb816eda0af02b0c0436fe42c0/c/c/cco_ma_473ml_monstercan_1000x1000_1__4.png',
            'description' => 'Refresco de 600ml',
            'category_id' => '1',

        ]);
    }
}
