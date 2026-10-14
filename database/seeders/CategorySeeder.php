<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Kuliner & Warung Makan', 'icon' => 'utensils'],
            ['name' => 'Kelontong & Sembako', 'icon' => 'shopping-bag'],
            ['name' => 'Jasa & Perbaikan', 'icon' => 'wrench'],
            ['name' => 'Fashion & Pakaian', 'icon' => 'shirt'],
            ['name' => 'Kerajinan & Souvenir', 'icon' => 'gift'],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(
                ['slug' => Str::slug($cat['name'])],
                [
                    'name' => $cat['name'],
                    'icon' => $cat['icon'],
                ]
            );
        }
    }
}
