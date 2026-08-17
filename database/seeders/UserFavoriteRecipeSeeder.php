<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\User;
use App\Models\UserFavoriteRecipe;
use Illuminate\Database\Seeder;

class UserFavoriteRecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $recipes = Recipe::all();

        foreach ($users as $user) {
            $randomRecipeList = fake()->randomElements($recipes,
                fake()->numberBetween(0, sizeof($recipes) - 1));
            foreach ($randomRecipeList as $recipe) {
                UserFavoriteRecipe::query()->create([
                    "user_id" => $user->id,
                    "recipe_id" => $recipe->id,
                ]);
            }
        }
    }
}
