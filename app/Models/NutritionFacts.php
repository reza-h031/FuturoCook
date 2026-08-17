<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionFacts extends Model
{
    use HasFactory;

    protected $fillable = [
        "ingredient_id", "fat", "carbs", "protein", "cholesterol", "fiber", "saturated_fat", "sugar"
    ];
}
