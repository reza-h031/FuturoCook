<?php

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('step_images', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Media::class)
                ->constrained()->cascadeOnDelete();
//            $table->string("caption");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('step_images');
    }
};
