<?php

use App\Models\Nutrition;
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
        Schema::create('recipe_and_nutrition', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Recipe::class);
            $table->foreignIdFor(Nutrition::class);
            $table->float("value");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_and_nutrition');
    }
};
