<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipe1 = Recipe::create([
            'name' => 'Hamburger',
        ]);

        $recipe1->ingredients()->createMany([
            ['ingredient_name' => 'tomato', 'quantity' => 7],
            ['ingredient_name' => 'lettuce', 'quantity' => 3],
            ['ingredient_name' => 'onion', 'quantity' => 6],
            ['ingredient_name' => 'ketchup', 'quantity' => 10],
            ['ingredient_name' => 'cheese', 'quantity' => 8],
            ['ingredient_name' => 'meat', 'quantity' => 3],
        ]);

        $recipe2 = Recipe::create([
            'name' => 'Rice with roasted chicken',
        ]);

        $recipe2->ingredients()->createMany([
            ['ingredient_name' => 'rice', 'quantity' => 6],
            ['ingredient_name' => 'chicken', 'quantity' => 8],
            ['ingredient_name' => 'lettuce', 'quantity' => 3],
            ['ingredient_name' => 'onion', 'quantity' => 9],
            ['ingredient_name' => 'tomato', 'quantity' => 4],
        ]);

        $recipe3 = Recipe::create([
            'name' => 'Tomato and Rice Soup',
        ]);

        $recipe3->ingredients()->createMany([
            ['ingredient_name' => 'rice', 'quantity' => 8],
            ['ingredient_name' => 'tomato', 'quantity' => 10],
            ['ingredient_name' => 'onion', 'quantity' => 6],
            ['ingredient_name' => 'potato', 'quantity' => 8],
        ]);

        $recipe4 = Recipe::create([
            'name' => 'Potato and Cheese Stuffed Meatballs',
        ]);

        $recipe4->ingredients()->createMany([
            ['ingredient_name' => 'potato', 'quantity' => 13],
            ['ingredient_name' => 'cheese', 'quantity' => 7],
            ['ingredient_name' => 'meat', 'quantity' => 10],
            ['ingredient_name' => 'onion', 'quantity' => 4],
        ]);

        $recipe5 = Recipe::create([
            'name' => 'Cheesy Baked Potato Casserole',
        ]);

        $recipe5->ingredients()->createMany([
            ['ingredient_name' => 'potato', 'quantity' => 8],
            ['ingredient_name' => 'cheese', 'quantity' => 8],
            ['ingredient_name' => 'onion', 'quantity' => 4],
        ]);

        $recipe6 = Recipe::create([
            'name' => 'Lemon-Grilled Chicken Skewers',
        ]);

        $recipe6->ingredients()->createMany([
            ['ingredient_name' => 'chicken', 'quantity' => 7],
            ['ingredient_name' => 'onion', 'quantity' => 2],
            ['ingredient_name' => 'lettuce', 'quantity' => 7],
            ['ingredient_name' => 'lemon', 'quantity' => 8],
        ]);
    }
}
