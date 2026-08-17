<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\ShoppingAndUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class ShoppingAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userList = User::all();
        $ingredientList = Ingredient::all();
        foreach ($userList as $user) {
            $randomIngredientList = fake()->randomElements($ingredientList,
                fake()->numberBetween(0, sizeof($ingredientList) - 1));
            foreach ($randomIngredientList as $ingredient) {
                ShoppingAndUser::factory()->create([
                    "user_id" => $user->id,
                    "ingredient_id" => $ingredient->id,
                ]);
            }
        }
    }
}
