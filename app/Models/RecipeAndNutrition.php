<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeAndNutrition extends Model
{
    use HasFactory;

    protected $fillable = [
        "recipe_id", "nutrition_id", "value",
    ];

    protected $hidden = [
        "recipe_id", "nutrition_id"
    ];
}
