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
            ['ingredient_name' => 'tomato', 'quantity' => 2],
            ['ingredient_name' => 'lettuce', 'quantity' => 1],
            ['ingredient_name' => 'onion', 'quantity' => 2],
            ['ingredient_name' => 'ketchup', 'quantity' => 1],
            ['ingredient_name' => 'cheese', 'quantity' => 1],
            ['ingredient_name' => 'meat', 'quantity' => 1],
        ]);

        $recipe2 = Recipe::create([
            'name' => 'Rice with roasted chicken',
        ]);

        $recipe2->ingredients()->createMany([
            ['ingredient_name' => 'rice', 'quantity' => 5],
            ['ingredient_name' => 'chicken', 'quantity' => 2],
            ['ingredient_name' => 'lettuce', 'quantity' => 3],
            ['ingredient_name' => 'onion', 'quantity' => 1],
            ['ingredient_name' => 'tomato', 'quantity' => 4],
        ]);

        $recipe3 = Recipe::create([
            'name' => 'Tomato and Rice Soup',
        ]);

        $recipe3->ingredients()->createMany([
            ['ingredient_name' => 'rice', 'quantity' => 3],
            ['ingredient_name' => 'tomato', 'quantity' => 10],
            ['ingredient_name' => 'onion', 'quantity' => 2],
            ['ingredient_name' => 'potato', 'quantity' => 5],
        ]);

        $recipe4 = Recipe::create([
            'name' => 'Potato and Cheese Stuffed Meatballs',
        ]);

        $recipe4->ingredients()->createMany([
            ['ingredient_name' => 'potato', 'quantity' => 5],
            ['ingredient_name' => 'cheese', 'quantity' => 5],
            ['ingredient_name' => 'meat', 'quantity' => 3],
            ['ingredient_name' => 'onion', 'quantity' => 2],
        ]);

        $recipe5 = Recipe::create([
            'name' => 'Cheesy Baked Potato Casserole',
        ]);

        $recipe5->ingredients()->createMany([
            ['ingredient_name' => 'potato', 'quantity' => 5],
            ['ingredient_name' => 'cheese', 'quantity' => 5],
            ['ingredient_name' => 'onion', 'quantity' => 3],
        ]);

        $recipe6 = Recipe::create([
            'name' => 'Lemon-Grilled Chicken Skewers',
        ]);

        $recipe6->ingredients()->createMany([
            ['ingredient_name' => 'chicken', 'quantity' => 3],
            ['ingredient_name' => 'onion', 'quantity' => 2],
            ['ingredient_name' => 'lettuce', 'quantity' => 2],
            ['ingredient_name' => 'lemon', 'quantity' => 3],
        ]);
    }
}
