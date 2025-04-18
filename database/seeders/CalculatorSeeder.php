<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalculatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('calculators')->insert([
            ['name' => 'Chicken Breast', 'protein' => 31, 'carbs' => 0, 'fats' => 3, 'calories' => 165],
            ['name' => 'Rice', 'protein' => 2.7, 'carbs' => 28, 'fats' => 0.3, 'calories' => 130],
            ['name' => 'Eggs', 'protein' => 13, 'carbs' => 1, 'fats' => 11, 'calories' => 155],
            ['name' => 'Milk', 'protein' => 3.4, 'carbs' => 5, 'fats' => 3.3, 'calories' => 64],
            ['name' => 'Broccoli', 'protein' => 2.8, 'carbs' => 7, 'fats' => 0.4, 'calories' => 34],
            ['name' => 'Almonds', 'protein' => 21, 'carbs' => 22, 'fats' => 49, 'calories' => 575],
            ['name' => 'Salmon', 'protein' => 20, 'carbs' => 0, 'fats' => 13, 'calories' => 208],
            ['name' => 'Sweet Potato', 'protein' => 1.6, 'carbs' => 20, 'fats' => 0.1, 'calories' => 86],
            ['name' => 'Oats', 'protein' => 17, 'carbs' => 66, 'fats' => 7, 'calories' => 389],
            ['name' => 'Banana', 'protein' => 1.3, 'carbs' => 23, 'fats' => 0.3, 'calories' => 96],
            ['name' => 'Apple', 'protein' => 0.3, 'carbs' => 14, 'fats' => 0.2, 'calories' => 52],
            ['name' => 'Beef Steak', 'protein' => 25, 'carbs' => 0, 'fats' => 20, 'calories' => 271],
            ['name' => 'Peanut Butter', 'protein' => 25, 'carbs' => 20, 'fats' => 50, 'calories' => 588],
            ['name' => 'Avocado', 'protein' => 2, 'carbs' => 9, 'fats' => 15, 'calories' => 160],
            ['name' => 'Blueberries', 'protein' => 0.7, 'carbs' => 14, 'fats' => 0.3, 'calories' => 57],
            ['name' => 'Spinach', 'protein' => 2.9, 'carbs' => 3.6, 'fats' => 0.4, 'calories' => 23],
            ['name' => 'Greek Yogurt', 'protein' => 10, 'carbs' => 3.6, 'fats' => 0.4, 'calories' => 59],
            ['name' => 'Quinoa', 'protein' => 4.4, 'carbs' => 21, 'fats' => 1.9, 'calories' => 120],
            ['name' => 'Carrots', 'protein' => 0.9, 'carbs' => 10, 'fats' => 0.2, 'calories' => 41],
            ['name' => 'Tuna', 'protein' => 29, 'carbs' => 0, 'fats' => 1, 'calories' => 132],
            ['name' => 'Cashews', 'protein' => 18, 'carbs' => 30, 'fats' => 44, 'calories' => 553],
            ['name' => 'Tofu', 'protein' => 8, 'carbs' => 2, 'fats' => 4, 'calories' => 76],
            ['name' => 'Cheddar Cheese', 'protein' => 25, 'carbs' => 1.3, 'fats' => 33, 'calories' => 402],
            ['name' => 'Chia Seeds', 'protein' => 16, 'carbs' => 42, 'fats' => 31, 'calories' => 486],
            ['name' => 'Oranges', 'protein' => 0.9, 'carbs' => 12, 'fats' => 0.1, 'calories' => 47],
            ['name' => 'Shrimp', 'protein' => 20, 'carbs' => 0.2, 'fats' => 1.7, 'calories' => 99],
            ['name' => 'Whole Wheat Bread', 'protein' => 12, 'carbs' => 45, 'fats' => 3.5, 'calories' => 247],
            ['name' => 'Cucumber', 'protein' => 0.7, 'carbs' => 3.6, 'fats' => 0.1, 'calories' => 15],
            ['name' => 'Lentils', 'protein' => 9, 'carbs' => 20, 'fats' => 0.4, 'calories' => 116],
            ['name' => 'Walnuts', 'protein' => 15, 'carbs' => 14, 'fats' => 65, 'calories' => 654],
            ['name' => 'Turkey Breast', 'protein' => 29, 'carbs' => 0, 'fats' => 1, 'calories' => 135],
            ['name' => 'Green Beans', 'protein' => 1.8, 'carbs' => 7, 'fats' => 0.1, 'calories' => 31],
            ['name' => 'Dark Chocolate', 'protein' => 7.9, 'carbs' => 46, 'fats' => 43, 'calories' => 598],
            ['name' => 'Pasta', 'protein' => 5.1, 'carbs' => 25, 'fats' => 1.1, 'calories' => 131],
            ['name' => 'Potatoes', 'protein' => 2, 'carbs' => 17, 'fats' => 0.1, 'calories' => 77],
            ['name' => 'Peas', 'protein' => 5.4, 'carbs' => 14, 'fats' => 0.4, 'calories' => 81],
            ['name' => 'Bell Peppers', 'protein' => 0.9, 'carbs' => 6, 'fats' => 0.2, 'calories' => 26],
            ['name' => 'Mango', 'protein' => 0.8, 'carbs' => 15, 'fats' => 0.4, 'calories' => 60],
            ['name' => 'Pumpkin Seeds', 'protein' => 19, 'carbs' => 54, 'fats' => 19, 'calories' => 446],
            ['name' => 'Pineapple', 'protein' => 0.5, 'carbs' => 13, 'fats' => 0.1, 'calories' => 50],
            ['name' => 'Trail Mix', 'protein' => 8, 'carbs' => 43, 'fats' => 24, 'calories' => 490],
            ['name' => 'Sardines', 'protein' => 25, 'carbs' => 0, 'fats' => 11, 'calories' => 208],
            ['name' => 'Asparagus', 'protein' => 2.2, 'carbs' => 3.9, 'fats' => 0.2, 'calories' => 20],
            ['name' => 'Lettuce', 'protein' => 1.4, 'carbs' => 2.9, 'fats' => 0.2, 'calories' => 15],
            ['name' => 'Strawberries', 'protein' => 0.8, 'carbs' => 7.7, 'fats' => 0.3, 'calories' => 32],
            ['name' => 'Black Beans', 'protein' => 21, 'carbs' => 63, 'fats' => 0.9, 'calories' => 341],
            ['name' => 'Raspberries', 'protein' => 1.2, 'carbs' => 12, 'fats' => 0.7, 'calories' => 52],
            ['name' => 'Scallops', 'protein' => 20, 'carbs' => 3.2, 'fats' => 0.8, 'calories' => 95],
            ['name' => 'Mozzarella Cheese', 'protein' => 22, 'carbs' => 2.2, 'fats' => 22, 'calories' => 300],
            ['name' => 'Beets', 'protein' => 1.6, 'carbs' => 10, 'fats' => 0.2, 'calories' => 43],
            ['name' => 'Onions', 'protein' => 1.1, 'carbs' => 9.3, 'fats' => 0.1, 'calories' => 40],
            ['name' => 'Garlic', 'protein' => 6.4, 'carbs' => 33, 'fats' => 0.5, 'calories' => 149],
            ['name' => 'Zucchini', 'protein' => 1.2, 'carbs' => 3.1, 'fats' => 0.1, 'calories' => 17],
            ['name' => 'Eggplant', 'protein' => 1, 'carbs' => 6, 'fats' => 0.2, 'calories' => 25],
            ['name' => 'Kiwi', 'protein' => 1.1, 'carbs' => 15, 'fats' => 0.5, 'calories' => 61],
            ['name' => 'Cottage Cheese', 'protein' => 11, 'carbs' => 3.4, 'fats' => 4.3, 'calories' => 98],
            ['name' => 'Pork Sausage', 'protein' => 18, 'carbs' => 1.7, 'fats' => 28, 'calories' => 340],
            ['name' => 'Fish Fingers', 'protein' => 16, 'carbs' => 24, 'fats' => 10, 'calories' => 250],
            ['name' => 'Bagel', 'protein' => 9.8, 'carbs' => 48, 'fats' => 1.7, 'calories' => 245],
            ['name' => 'Pancakes', 'protein' => 5.3, 'carbs' => 28, 'fats' => 6.3, 'calories' => 174],
            ['name' => 'Butter', 'protein' => 0.9, 'carbs' => 0.1, 'fats' => 81, 'calories' => 717],
        ]);
    }
}
