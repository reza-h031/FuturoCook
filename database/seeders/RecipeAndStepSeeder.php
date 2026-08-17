<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeAndStep;
use App\Models\Step;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeAndStepSeeder extends Seeder
{
    private const MIN_STEPS = 3;
    private const MAX_STEPS = 20;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipeList = Recipe::all();
        $stepList = Step::all();
        foreach ($recipeList as $recipe) {
            $randomIngredientStepNumber = fake()->numberBetween(self::MIN_STEPS,
                min(self::MAX_STEPS, sizeof($stepList)));
            $randomStepList = fake()->randomElements($stepList, $randomIngredientStepNumber);
            foreach ($randomStepList as $key => $step) {
                RecipeAndStep::factory()->create([
                    "recipe_id" => $recipe->id,
                    "step_id" => $step->id,
                    "step" => $key + 1
                ]);
            }
        }
    }
}
