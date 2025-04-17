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
        $products = [
            ['name' => 'MP Combat', 'price' => 60, 'category' => 'Protein Powders', 'image' => 'imgs/Products/Product-Images/1.png'],
            ['name' => 'Whey Isolate', 'price' => 55, 'category' => 'Protein Powders', 'image' => 'imgs/Products/Product-Images/2.png'],
            ['name' => 'Gold Whey', 'price' => 65, 'category' => 'Protein Powders', 'image' => 'imgs/Products/Product-Images/3.png'],
            ['name' => 'Musashi High', 'price' => 70, 'category' => 'Protein Powders', 'image' => 'imgs/Products/Product-Images/4.png'],
            ['name' => 'Euphoriq Pre-Workout', 'price' => 55, 'category' => 'Protein Powders', 'image' => 'imgs/Products/Product-Images/5.png'],
            ['name' => 'BCAA Mega Size', 'price' => 45, 'category' => 'Protein Powders', 'image' => 'imgs/Products/Product-Images/6.png'],
            ['name' => 'Vanilla Cake', 'price' => 40, 'category' => 'Flakes', 'image' => 'imgs/Products/Product-Images/7.png'],
            ['name' => 'BlueBerry Yogurt', 'price' => 40, 'category' => 'Flakes', 'image' => 'imgs/Products/Product-Images/8.png'],
            ['name' => 'Vanilla Cake', 'price' => 40, 'category' => 'Flakes', 'image' => 'imgs/Products/Product-Images/9.png'],
            ['name' => "S'mores Bar", 'price' => 40, 'category' => 'Flakes', 'image' => 'imgs/Products/Product-Images/10.png'],
            ['name' => 'Chocolate & Peanut Bar', 'price' => 40, 'category' => 'Flakes', 'image' => 'imgs/Products/Product-Images/11.png'],
            ['name' => 'Cookie Dough Bard', 'price' => 40, 'category' => 'Flakes', 'image' => 'imgs/Products/Product-Images/12.png'],
            ['name' => 'True-Mass Vanilla', 'price' => 19.99, 'category' => 'Mass Gainer', 'image' => 'imgs/Products/Product-Images/13.png'],
            ['name' => 'Dymatize Red', 'price' => 50, 'category' => 'Mass Gainer', 'image' => 'imgs/Products/Product-Images/14.png'],
            ['name' => 'True-Mass Chocolate', 'price' => 45, 'category' => 'Mass Gainer', 'image' => 'imgs/Products/Product-Images/15.png'],
            ['name' => 'Muscle Tech', 'price' => 55, 'category' => 'Mass Gainer', 'image' => 'imgs/Products/Product-Images/16.png'],
            ['name' => 'Gold Pro Gainer', 'price' => 55, 'category' => 'Mass Gainer', 'image' => 'imgs/Products/Product-Images/17.png'],
            ['name' => 'Essential Mass Gainer', 'price' => 50, 'category' => 'Mass Gainer', 'image' => 'imgs/Products/Product-Images/18.png'],
            ['name' => 'Amino Green Apple', 'price' => 40, 'category' => 'Energy Flavors', 'image' => 'imgs/Products/Product-Images/19.png'],
            ['name' => 'Amino Blueberry Mojito', 'price' => 40, 'category' => 'Energy Flavors', 'image' => 'imgs/Products/Product-Images/20.png'],
            ['name' => 'Amino WaterMelon', 'price' => 40, 'category' => 'Energy Flavors', 'image' => 'imgs/Products/Product-Images/21.png'],
            ['name' => 'Amino Tangerine', 'price' => 40, 'category' => 'Energy Flavors', 'image' => 'imgs/Products/Product-Images/22.png'],
            ['name' => 'Amino PineApple', 'price' => 40, 'category' => 'Energy Flavors', 'image' => 'imgs/Products/Product-Images/23.png'],
            ['name' => 'Amino Blue Raspberry', 'price' => 40, 'category' => 'Energy Flavors', 'image' => 'imgs/Products/Product-Images/24.png'],
        ];
    
        foreach ($products as $product) {
            $category = Category::where('name', $product['category'])->first();
    
            if ($category) {
                Product::create([
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'image' => $product['image'],
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
