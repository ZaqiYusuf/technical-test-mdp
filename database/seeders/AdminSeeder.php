<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Perpustakaan',
            'username' => 'admin',
            'email' => 'Admin@gmail.com',
            'role' => 'admin',
            'address' => 'Purimas Regency',
            'password' => '12345'
        ]);
    }
}
