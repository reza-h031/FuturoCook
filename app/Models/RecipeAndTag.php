<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeAndTag extends Model
{
    use HasFactory;

    protected $fillable = [
        "recipe_id", "tag_id",
    ];
}
