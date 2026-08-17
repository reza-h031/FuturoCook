<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\RecipeNutritionFacts;
use Illuminate\Database\Seeder;

class RecipeNutritionFactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = Recipe::all();
        foreach ($recipes as $recipe) {
            RecipeNutritionFacts::factory()->create([
                "recipe_id" => $recipe->id,
            ]);
        }
    }
}
