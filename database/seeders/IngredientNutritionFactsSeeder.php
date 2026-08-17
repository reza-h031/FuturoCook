<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\IngredientNutritionFacts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientNutritionFactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = Ingredient::all();
        foreach ($ingredients as $ingredient) {
            IngredientNutritionFacts::factory()->create([
                "ingredient_id" => $ingredient->id
            ]);
        }
    }
}
