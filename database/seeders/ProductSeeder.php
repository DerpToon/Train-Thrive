<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = Category::all()->keyBy('name');

        $products = [
            ['name' => 'Whey Isolate', 'price' => 29.99, 'image' => 'imgs/Products Images/1.png', 'category' => 'Protein Powders'],
            ['name' => 'Chocolate Gainer', 'price' => 34.99, 'image' => 'Images/Products/gainer.jpg', 'category' => 'Mass Gainers'],
            ['name' => 'Banana Energy', 'price' => 9.99, 'image' => 'Images/Products/banana.jpg', 'category' => 'Energy Flavors'],
            ['name' => 'Oats Flakes', 'price' => 5.99, 'image' => 'Images/Products/oats.jpg', 'category' => 'Flakes'],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'category_id' => $categories[$product['category']]->id,
            ]);
        }
    }
}
