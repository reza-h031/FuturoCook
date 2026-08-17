<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteRecipe extends Model
{
    /** @use HasFactory<\Database\Factories\UserFavoriteRecipeFactory> */
    use HasFactory;

    protected $fillable = [
        "user_id", "recipe_id"
    ];
}
