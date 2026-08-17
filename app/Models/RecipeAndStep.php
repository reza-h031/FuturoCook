<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RecipeAndStep extends Pivot
{
    use HasFactory;

    protected $table = "recipe_and_steps";

    protected $fillable = [
        "recipe_id", "step_id", "step"
    ];

    public function stepObj(): BelongsTo
    {
        return $this->belongsTo(Step::class, "step_id", "id");
    }

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

//    public function step(): BelongsTo
//    {
//        return $this->belongsTo(Step::class);
//    }
}
