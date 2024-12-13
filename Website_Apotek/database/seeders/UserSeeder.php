<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // pastikan model User sudah ada
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
        // Menambahkan beberapa data user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // Pastikan menggunakan Hash untuk password
            'dob' => '1980-01-01',
            'phone' => '081234567890',
            'role' => 'admin', // Menggunakan role admin
        ]);

        User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
            'dob' => '1990-05-12',
            'phone' => '089876543210',
            'role' => 'user', // Menggunakan role user
        ]);

        // Anda bisa menambahkan lebih banyak data jika diperlukan
    }
}