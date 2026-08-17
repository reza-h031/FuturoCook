<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "image_id",
    ];

    protected $hidden = [
        "created_at", "updated_at","image_id"
    ];

    protected $appends = [
        "thumbnail","original_image"
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

    public function recipes()
    {
        return $this->hasMany(
            Recipe::class,
            "recipe_category_id"
        );
    }
}
