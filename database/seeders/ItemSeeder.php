<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::pluck('id', 'name');

        $items = [
            ['Keyboard', 'Aksesori', 150000, 10],
            ['Mouse', 'Aksesori', 75000, 20],
            ['Monitor', 'Perangkat Komputer', 1500000, 5],
            ['Headset', 'Aksesori', 250000, 8],
            ['Flashdisk', 'Penyimpanan', 85000, 15],
        ];

        foreach ($items as [$name, $category, $price, $stock]) {
            Item::firstOrCreate(
                ['name' => $name],
                ['category_id' => $categories[$category], 'price' => $price, 'stock' => $stock]
            );
        }
    }
}