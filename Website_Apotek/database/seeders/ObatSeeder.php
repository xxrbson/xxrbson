<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Obat;

class ObatSeeder extends Seeder
{
    public function run()
    {
        Obat::create([
            'nama_obat' => 'Obat A',
            'brand_id' => 1, // Relasi dengan Brand
            'category_id' => 1, // Relasi dengan Category
            'deskripsi' => 'Deskripsi tentang Obat A',
            'harga' => 10000.00, // Harga dalam format decimal
            'stok' => 50,
            'image' => 'images/produk-tolak-angin.png', // Gambar obat
            'terlaris' => false, // Obat ini tidak terlaris
            'weight' => 100.50, // Berat obat dalam gram
        ]);

        Obat::create([
            'nama_obat' => 'Obat B',
            'brand_id' => 2, // Relasi dengan Brand
            'category_id' => 2, // Relasi dengan Category
            'deskripsi' => 'Deskripsi tentang Obat B',
            'harga' => 15000.00,
            'stok' => 30,
            'image' => 'images/obat_b_image.jpg', // Gambar obat
            'terlaris' => true, // Obat ini terlaris
            'weight' => 200.75, // Berat obat dalam gram
        ]);
    }
}