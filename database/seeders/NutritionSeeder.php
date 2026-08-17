<?php

namespace Database\Seeders;

use App\Models\Nutrition;
use Illuminate\Database\Seeder;

class NutritionSeeder extends Seeder
{
    private const NUTRITION_LIST = ["fat", "carbs", "protein", "cholesterol", "fiber", "saturated_fat", "sugar"];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::NUTRITION_LIST as $nutrition) {
            Nutrition::factory()->create([
                "name" => $nutrition
            ]);
        }
    }
}
