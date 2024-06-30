<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
        ]);

        Store::create([
            'slug' => "Lorem Jogja",
            'picture' => 'example.jpg',
            'name' => 'Example Store',
            'location' => '123 Example St, Example City',
            'bio' => 'This is an example store.',
            'email' => 'example@store.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => 12345,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create 40 dummy product
        for ($i = 1; $i <= 40; $i++) {
            Product::create([
                'slug' => 'mens_cotton_jacket' . $i,
                'picture' => 'https://fakestoreapi.com/img/71li-ujtlUL._AC_UX679_.jpg',
                'name' => 'Mens Cotton Jacket ' . $i,
                'price' => 350.99,
                'description' => 'This is an example product description.',
                'gender' => 'male',
                'size' => 'M',
                'quantity' => 1,
                'condition' => 'new',
                'status' => 'sale',
                'category_id' => 1, // Adjust the category_id as needed
                'store_id' => 1, // Adjust the store_id as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
