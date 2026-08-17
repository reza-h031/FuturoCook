<?php

use App\Models\RecipeCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string("status")->default("draft");
            $table->string("name");
            $table->float("rate")->default(0);
            $table->integer("time");
            $table->float("calories");
            // replace by foreign key (media) later
            $table->text("image_id");
            $table->integer("media_video_id");
            $table->foreignIdFor(RecipeCategory::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
