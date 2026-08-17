<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeNutritionFacts extends Model
{
    use HasFactory;

    protected $fillable = [
        "recipe_id", "fat", "carbs", "protein", "cholesterol", "fiber", "saturated_fat", "sugar"
    ];

    protected $hidden = [
        "id", "recipe_id", "created_at", "updated_at"
    ];
}
