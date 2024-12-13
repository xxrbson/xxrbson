<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run()
    {
        Brand::create([
            'name' => 'Brand A',
        ]);

        Brand::create([
            'name' => 'Brand B',
        ]);
    }
}