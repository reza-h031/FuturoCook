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

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "ingredient_category_id", "image_id", "calories",
    ];

    protected $hidden = [
        "created_at", "updated_at", "ingredient_category_id", "pivot", "image_id"
    ];

    protected $appends = [
        "thumbnail", "original_image", "amount", "unit", "is_done"
    ];

    public function getThumbnailAttribute(): string|UrlGenerator
    {
        return url("storage/" . $this->thumbnail()?->first()?->path ?? "empty");
    }

    public function getOriginalImageAttribute(): string|UrlGenerator
    {
        return url("storage/" . $this->originalImage()?->first()?->path ?? "empty");
    }

    public function getAmountAttribute()
    {
        return $this->pivot?->amount ?? null;
    }

    public function getUnitAttribute()
    {
        return $this->pivot?->unit ?? null;
    }

    public function getIsDoneAttribute()
    {
        return $this->pivot?->is_done ?? null;
    }

    public function thumbnail(): BelongsTo
    {
        return $this->belongsTo(
            MediaVariants::class,
            "image_id",
            "id"
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            IngredientCategory::class,
            "ingredient_category_id",
            "id",
        );
    }

    /*    public function nutrition(): BelongsToMany
        {
            return $this->belongsToMany(
                Nutrition::class,
                "ingredient_and_nutrition",
                "ingredient_id",
                "nutrition_id",
                relation: "nutrition"
            )->withPivot("value");
        }*/

    public function nutrition(): HasOne
    {
        return $this->hasOne(IngredientNutritionFacts::class);
    }


    public function users(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            "user_and_ingredients",
            "ingredient_id",
            "user_id",
        );
    }

    public function shopping(): BelongsToMany
    {
        return $this->belongsToMany(
            Ingredient::class,
            "shopping_and_users",
            "ingredient_id",
            "id"
        );
    }

    public function imageAddress(): HasOne
    {
        return $this->hasOne(MyMedia::class, "id", "image_id");
    }

    public function shoppingAndUsers(): HasMany
    {
        return $this->hasMany(ShoppingAndUser::class);
    }
}
