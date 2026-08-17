<?php

namespace Database\Seeders;

use App\Models\RecipeTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecipeTag::factory(Utils::RECIPE_TAG_NUMBER)->create();
    }
}
