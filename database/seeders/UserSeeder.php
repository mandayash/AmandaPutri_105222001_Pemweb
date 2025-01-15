<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\User::create([
        'name' => 'Amanda Putri',
            'email' => 'amandayash20@gmail.com',
            'username' => 'mandayash',
            'password' => bcrypt('rahasiakita')
        ]);

}
}
