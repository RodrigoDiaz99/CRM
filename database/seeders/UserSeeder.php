<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = User::create([
            'first_name' => 'Super Admin',
            'second_name' => 'Super Admin',
            'first_last_name' => 'Super Admin',
            'second_last_name' => 'Super Admin',
            'email' => 'store@serviciospeninsula.xyz',

            'password' => Hash::make('serviciospeninsula12'),
            'email_verified_at'=>'2021-06-01 19:07:38',

        ]);
        $super->assignRole('Admin');
         $super2 = User::create([
            'first_name' => 'Carlos',
            'second_name' => '',
            'first_last_name' => 'Ramirez',
            'second_last_name' => 'Null',
            'email' => 'carlosramirez@armyprolife.com',

            'password' => Hash::make('Secret12'),
            'email_verified_at'=>'2021-06-01 19:07:38',

        ]);
        $super2->assignRole('Admin');


    }
}
