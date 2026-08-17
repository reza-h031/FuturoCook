<?php

use App\Models\Step;
use App\Models\StepImage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('step_and_images', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Step::class);
            $table->foreignIdFor(StepImage::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('step_and_images');
    }
};
