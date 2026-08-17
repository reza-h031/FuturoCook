<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepImage extends Model
{
    use HasFactory;

    protected $fillable = [
        "media_id"
    ];

    protected $hidden = [
        "id", "created_at", "updated_at", "pivot", "media_id"
    ];

    protected $appends = [
        "image"
    ];

    public function getImageAttribute()
    {
        return url("storage/" . $this->media()?->first()?->path);
    }

    public function steps()
    {
        return $this->belongsToMany(
            Step::class,
            "step_and_images",
            "step_image_id",
            "step_id"
        );
    }

    public function media()
    {
        return $this->belongsTo(
            Media::class
        );
    }
}
