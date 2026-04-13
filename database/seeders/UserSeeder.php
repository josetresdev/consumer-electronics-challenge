<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Jose',
            'email' => 'jose@test.com',
            'password' => Hash::make('123456'),
        ]);

        User::create([
            'name' => 'Nolberto Gaviria',
            'email' => 'nolberto@test.com',
            'password' => Hash::make('123456'),
        ]);
    }
}