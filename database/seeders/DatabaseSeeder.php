<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama'	=> 'admin',
            'email'	=> 'admin@gmail.com',
            'password'	=> bcrypt('admin'),
            'noTelp' => '081377600643'
        ]);
    }
}
