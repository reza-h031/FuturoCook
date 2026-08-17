<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\IngredientCategory;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryList = IngredientCategory::all();

        for ($i = 0; $i < Utils::INGREDIENT_NUMBER; $i++) {
            Ingredient::factory()->create([
                "ingredient_category_id" => fake()->randomElement($categoryList)->id,
            ]);
        }
    }
}
