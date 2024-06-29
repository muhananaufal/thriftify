<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['name' => 'Tops'],
            ['name' => 'Bottoms'],
            ['name' => 'Outwear'],
            ['name' => 'Accessories'],
            ['name' => 'Footwear'],
            ['name' => 'Sports'],
            ['name' => 'Kids'],
            ['name' => 'Others'],
        ];

        foreach ($categories as $categoryData) {
            $slug = Str::slug($categoryData['name'], '-');
            Category::create([
                'name' => $categoryData['name'],
                'slug' => $slug,
            ]);
        }
    }
}
