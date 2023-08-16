<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $productTypes = [
            "სურსათი",
            "სარეცხი საშუალებები",
            "ხორც პროდუქტები"
        ];

        foreach ($productTypes as $type) {
            ProductType::create(['title' => $type]);
        }
    }
}
