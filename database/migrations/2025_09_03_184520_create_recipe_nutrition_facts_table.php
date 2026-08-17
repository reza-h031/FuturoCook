<?php

use App\Models\Recipe;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipe_nutrition_facts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Recipe::class);
            $table->float("fat");
            $table->float("carbs");
            $table->float("protein");
            $table->float("cholesterol");
            $table->float("fiber");
            $table->float("saturated_fat");
            $table->float("sugar");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_nutrition_facts');
    }
};
