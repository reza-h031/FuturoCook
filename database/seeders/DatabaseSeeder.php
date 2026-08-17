<?php

namespace Database\Seeders;

use App\Models\MediaVariants;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(IngredientCategorySeeder::class);
        $this->call(NutritionSeeder::class);
        $this->call(RecipeCategorySeeder::class);
        $this->call(RecipeTagSeeder::class);
        $this->call(StepSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(IngredientSeeder::class);
        $this->call(IngredientAndNutritionSeeder::class);
        $this->call(RecipeSeeder::class);
        $this->call(RecipeAndIngredientSeeder::class);
        $this->call(RecipeAndNutritionSeeder::class);
        $this->call(RecipeAndStepSeeder::class);
        $this->call(RecipeAndTagSeeder::class);
        $this->call(ShoppingAndUserSeeder::class);
        $this->call(UserAndIngredientSeeder::class);

        $this->call(MediaSeeder::class);
        $this->call(MediaVariantsSeeder::class);

        $this->call(IngredientNutritionFactsSeeder::class);
        $this->call(RecipeNutritionFactsSeeder::class);
        $this->call(StepImageSeeder::class);
        $this->call(StepVideoSeeder::class);
        $this->call(StepAndImageSeeder::class);
        $this->call(StepAndVideoSeeder::class);

        $this->call(UserFavoriteRecipeSeeder::class);
    }
}
