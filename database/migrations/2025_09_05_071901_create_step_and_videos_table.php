<?php

use App\Models\Step;
use App\Models\StepVideo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('step_and_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Step::class);
            $table->foreignIdFor(StepVideo::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('step_and_videos');
    }
};
