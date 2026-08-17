<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientNutritionFacts extends Model
{
    use HasFactory;

    protected $fillable = [
        "ingredient_id", "fat", "carbs", "protein", "cholesterol", "fiber", "saturated_fat", "sugar"
    ];

    protected $hidden = [
        "id", "ingredient_id", "created_at", "updated_at"
    ];
}
