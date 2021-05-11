<?php

namespace Database\Seeders;

use App\Models\Talla;
use Illuminate\Database\Seeder;

class TallasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $talla1 = Talla::create([
            'talla' => 'XS',

        ]);
        $talla2 = Talla::create([
            'talla' => 'S',

        ]);
        $talla3 = Talla::create([
            'talla' => 'M',

        ]);
        $talla4 = Talla::create([
            'talla' => 'L',

        ]);
        $talla5 = Talla::create([
            'talla' => 'XL',

        ]);
        $talla6 = Talla::create([
            'talla' => 'XXL',

        ]);
        $talla7 = Talla::create([
            'talla' => '3XL',

        ]);
    }
}
