<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //Needs to be added for accessing DB

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
        DB::table('users')->insert([
            [
                'name' => 'aer123',
                'email' => 'aer@gmail.com',
                'password' => 'Sm1'
            ],
            [
                'name' => 'bxc2090',
                'email' => 'bxc2090@gmail.com',
                'password' => 'sdfgvdfvn#'
            ]
            ]
            );
    }
}
