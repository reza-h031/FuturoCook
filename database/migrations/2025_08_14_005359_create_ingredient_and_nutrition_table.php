<?php

use App\Models\Ingredient;
use App\Models\Nutrition;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ingredient_and_nutrition', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Ingredient::class);
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
        Schema::dropIfExists('ingredient_and_nutrition');
    }
};
