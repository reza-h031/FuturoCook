<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\NutritionFacts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NutritionFactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredientList = Ingredient::all();
        foreach ($ingredientList as $ingredient) {
            NutritionFacts::factory()->create([
                "ingredient_id" => $ingredient->id,
            ]);
        }
    }
}
