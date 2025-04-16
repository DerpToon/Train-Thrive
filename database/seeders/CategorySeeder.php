<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            ['name' => 'Protein Powders', 'image' => 'Images/Products/protein.jpg'],
            ['name' => 'Flakes', 'image' => 'Images/Products/flakes.jpg'],
            ['name' => 'Mass Gainers', 'image' => 'imgs/Products/mass.jpg'],
            ['name' => 'Meal Replacements', 'image' => '/imgs/Products/mealreplacement.jpg'],
            ['name' => 'Protein Bars', 'image' => '/imgs/Products/proteinbar.jpg'],
            ['name' => 'Protein Snacks', 'image' => '/imgs/Products/snacks.jpg'],
            ['name' => 'Energy Flavors', 'image' => '/public/imgs/Products/energy.jpg'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
