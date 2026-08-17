<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\RecipeCategory;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipeCategoryList = RecipeCategory::all();
        for ($i = 0; $i < Utils::RECIPE_NUMBER; $i++) {
            Recipe::factory()->create([
                "recipe_category_id" => fake()->randomElement($recipeCategoryList)->id,
            ]);
        }
    }
}
