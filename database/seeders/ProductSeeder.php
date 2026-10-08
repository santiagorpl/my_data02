<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $makanan = Category::where('nama', 'Makanan')->first();
        $minuman = Category::where('nama', 'Minuman')->first();
        $elektronik = Category::where('nama', 'Elektronik')->first();

        $products = [
            [
                'category_id' => $makanan ? $makanan->id : 1,
                'nama'        => 'Keripik Singkong',
                'price'       => 10000,
                'stock'       => 50,
            ],
            [
                'category_id' => $minuman ? $minuman->id : 1,
                'nama'        => 'Es Teh Manis Botol',
                'price'       => 5000,
                'stock'       => 30,
            ],
            [
                'category_id' => $elektronik ? $elektronik->id : 1,
                'nama'        => 'Kabel Data Type-C',
                'price'       => 25000,
                'stock'       => 15,
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(['nama' => $product['nama']], $product);
        }
    }
}
