<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "rate", "time", "calories", "image_id", "images", "videos", "recipe_category_id",
        "media_video_id"
    ];

    protected $hidden = [
        "created_at", "updated_at", "recipe_category_id", "image_id", "media_video_id"
    ];

    protected $appends = [
        "thumbnail", "original_image", "video"
    ];

    public function getThumbnailAttribute(): string|UrlGenerator
    {
        return url("storage/" . $this->thumbnail()?->first()?->path ?? "empty");
    }

    public function getOriginalImageAttribute(): string|UrlGenerator
    {
        return url("storage/" . $this->originalImage()?->first()?->path ?? "empty");
    }

    public function getVideoAttribute()
    {
        return url("storage/" . $this->videoMedia()?->first()?->path);
    }

    public function thumbnail(): BelongsTo
    {
        return $this->belongsTo(
            MediaVariants::class,
            "image_id",
            "media_id"
        );
    }

    public function originalImage(): BelongsTo
    {
        return $this->belongsTo(
            Media::class,
            "image_id",
            "id"
        );
    }

    public function videoMedia()
    {
        return $this->belongsTo(
            Media::class,
            "media_video_id",
            "id"
        );
    }

    public function category()
    {
        return $this->belongsTo(
            RecipeCategory::class,
            "recipe_category_id",
            "id"
        );
    }

    /*    public function nutrition(): BelongsToMany
        {
            return $this->belongsToMany(
                Nutrition::class,
                "recipe_and_nutrition",
                "recipe_id",
                "nutrition_id",
                relation: "nutrition"
            )->withPivot("value");
        }*/

    public function nutrition(): HasOne
    {
        return $this->hasOne(RecipeNutritionFacts::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(
            Ingredient::class,
            "recipe_and_ingredients",
            "recipe_id",
            "ingredient_id",
        )->withPivot(["amount", "unit"]);
    }

    public function recipeIngredients()
    {
        return $this->hasMany(RecipeAndIngredient::class);
    }

    public function steps(): BelongsToMany
    {
        return $this->belongsToMany(
            Step::class,
            "recipe_and_steps",
            "recipe_id",
            "step_id",
        )->withPivot("step");
    }

    public function recipeAndSteps(): HasMany
    {
        return $this->hasMany(RecipeAndStep::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            RecipeTag::class,
            "recipe_and_tags",
            "recipe_id",
            "recipe_tag_id"
        );
    }

    public function imageAddress(): BelongsTo
    {
        return $this->belongsTo(MyMedia::class, "image_id", "id");
    }

    protected static function booted()
    {
        static::saved(function ($recipe) {
            $recipe->calculateNutrition();
        });
    }

    public function calculateNutrition()
    {
        $this->load(['ingredients.nutrition']);

        $totals = [
            'fat' => 0,
            'carbs' => 0,
            'protein' => 0,
            'cholesterol' => 0,
            'fiber' => 0,
            'saturated_fat' => 0,
            'sugar' => 0,
        ];

        foreach ($this->ingredients as $ingredient) {
            $nutrition = $ingredient->nutrition;

            if (!$nutrition) {
                continue;
            }

            $amount = (float)($ingredient->pivot->amount ?? 0);
            $ratio = $amount / 100;

            foreach ($totals as $key => $value) {
                $totals[$key] += ((float)$nutrition->$key) * $ratio;
            }
        }

        $this->nutrition()->updateOrCreate(
            ['recipe_id' => $this->id],
            $totals
        );
    }
}
