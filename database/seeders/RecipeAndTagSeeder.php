<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\RecipeAndTag;
use App\Models\RecipeTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeAndTagSeeder extends Seeder
{
    private const MIN_TAG_NUMBER = 1;
    private const MAX_TAG_NUMBER = 3;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipeList = Recipe::all();
        $tagList = RecipeTag::all();
        foreach ($recipeList as $recipe) {
            $randomTagList = fake()->randomElements($tagList,
                fake()->numberBetween(self::MIN_TAG_NUMBER, self::MAX_TAG_NUMBER));
            foreach ($randomTagList as $tag) {
                RecipeAndTag::factory()->create([
                    "recipe_id" => $recipe->id,
                    "recipe_tag_id" => $tag->id,
                ]);
            }
        }
    }
}
