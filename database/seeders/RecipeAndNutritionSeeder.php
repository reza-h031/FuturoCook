<?php

namespace Database\Seeders;

use App\Models\Nutrition;
use App\Models\Recipe;
use App\Models\RecipeAndNutrition;
use Illuminate\Database\Seeder;

class RecipeAndNutritionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipeList = Recipe::all();
        $nutritionList = Nutrition::all();
        foreach ($recipeList as $recipe) {
            foreach ($nutritionList as $nutrition) {
                RecipeAndNutrition::factory()->create([
                    "recipe_id" => $recipe->id,
                    "nutrition_id" => $nutrition->id,
                ]);
            }
        }
    }
}
