<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Dr.Huston Butt',
            'username' => 'But',
            'password' => Hash::make('gal'),
            'outlet_id' => 1,
            'role' => 'OWNER'
        ]);

        User::create([
            'name' => 'Bonk',
            'username' => 'Hani',
            'password' => Hash::make('gal'),
            'outlet_id' => 1,
            'role' => 'ADMIN'
        ]);

        User::create([
            'name' => 'Adela',
            'username' => 'Accel',
            'password' => Hash::make('gal'),
            'outlet_id' => 1,
            'role' => 'CASHIER'
        ]);

        \App\Models\Members::factory(77)->create();
        \App\Models\Outlets::factory(7)->create();
        \App\Models\Packages::factory(17)->create();
        \App\Models\Transactions::factory(27)->create();
        \App\Models\TransactionDetails::factory(27)->create();
    }


}
