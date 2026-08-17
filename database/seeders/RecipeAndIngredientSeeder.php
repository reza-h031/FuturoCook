<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeAndIngredient;
use Illuminate\Database\Seeder;

class RecipeAndIngredientSeeder extends Seeder
{
    private const INGREDIENT_MIN_NUMBER = 5;
    private const INGREDIENT_MAX_NUMBER = 20;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipeList = Recipe::all();
        $ingredientList = Ingredient::all();
        foreach ($recipeList as $recipe) {
            $randomIngredientList = fake()->randomElements($ingredientList,
                fake()->numberBetween(3, sizeof($ingredientList)));
            foreach ($randomIngredientList as $randomIngredient) {
                RecipeAndIngredient::factory()->create([
                    "recipe_id" => $recipe->id,
                    "ingredient_id" => $randomIngredient->id,
                ]);
            }
        }
    }
}
