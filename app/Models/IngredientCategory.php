<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Database\Factories\IngredientCategoryFactory;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Mockery\Exception;

class IngredientCategory extends Model
{
    /** @use HasFactory<IngredientCategoryFactory> */
    use HasFactory;

    protected $fillable = [
        "name", "image_id"
    ];

    protected $hidden = [
        "created_at", "updated_at", "image_id"
    ];

    protected $appends = [
        "thumbnail", "original_image"
    ];

    public function getThumbnailAttribute(): string|UrlGenerator
    {
        return url("storage/" . $this->thumbnail()?->first()?->path ?? "empty");
    }

    public function getOriginalImageAttribute(): string|UrlGenerator
    {
        return url("storage/" . $this->originalImage()?->first()?->path ?? "empty");
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

    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredient::class, "ingredient_category_id");
    }

    public function imageAddress(): BelongsTo
    {
        return $this->belongsTo(MyMedia::class, "image_id", "id");
    }
}
