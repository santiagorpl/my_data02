<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['nama' => 'Makanan'],
            ['nama' => 'Minuman'],
            ['nama' => 'Elektronik'],
            ['nama' => 'Pakaian & Aksesoris'],
            ['nama' => 'Peralatan Rumah Tangga'],
            ['nama' => 'Alat Tulis Kantor (ATK)'],
            ['nama' => 'Kesehatan & Kecantikan'],
            ['nama' => 'Lainnya'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['nama' => $category['nama']]);
        }
    }
}
