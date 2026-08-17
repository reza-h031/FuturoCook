<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        "media_id"
    ];

    protected $hidden = [
        "id", "created_at", "updated_at", "pivot", "media_id"
    ];

    protected $appends = [
        "video"
    ];

    public function getVideoAttribute()
    {
        return url("storage/" . $this->media()?->first()?->path);
    }

    public function media()
    {
        return $this->belongsTo(
            Media::class
        );
    }
}
