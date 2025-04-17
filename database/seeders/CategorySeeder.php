<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ public function run(): void
    {
        $categories = [
            ['name' => 'Protein Powders', 'image' => './Images/Products/protien.png'],
            ['name' => 'Flakes', 'image' => './Images/Products/flakes.png'],
            ['name' => 'Mass Gainer', 'image' => './Images/Products/mass.png'],
            ['name' => 'Energy Flavors', 'image' => './Images/Products/energy.png'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
