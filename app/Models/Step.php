<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Step extends Model
{
    use HasFactory;

    protected $fillable = [
        "description", "step", "time", "thumbnail", "animation",
    ];

    protected $hidden = [
        "created_at", "updated_at", "pivot"
    ];

    protected $appends = ["step"];

    public function getStepAttribute()
    {
        return $this->pivot?->step;
    }

    public function recipeAndSteps(): HasMany
    {
        return $this->hasMany(RecipeAndStep::class);
    }

    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, "recipe_and_steps")
            ->withPivot("step")
            ->using(RecipeAndStep::class);
    }

    public function images(): BelongsToMany
    {
        return $this->belongsToMany(
            StepImage::class,
            'step_and_images',
            'step_id',
            'step_image_id'
        );
    }

    public function videos(): BelongsToMany
    {
        return $this->belongsToMany(
            StepVideo::class,
            "step_and_videos",
            "step_id",
            "step_video_id"
        );
    }
}
