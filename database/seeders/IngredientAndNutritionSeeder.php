<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\IngredientAndNutrition;
use App\Models\Nutrition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientAndNutritionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredientList = Ingredient::all();
        $nutritionList = Nutrition::all();
        foreach ($ingredientList as $ingredient) {
            foreach ($nutritionList as $nutrition) {
                IngredientAndNutrition::factory()->create([
                    "ingredient_id" => $ingredient->id,
                    "nutrition_id" => $nutrition->id,
                ]);
            }
        }
    }
}
