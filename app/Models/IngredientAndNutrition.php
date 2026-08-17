<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientAndNutrition extends Model
{
    use HasFactory;

    protected $fillable = [
        "ingredient_id", "nutrition_id", "value"
    ];

    protected $hidden = [
        "ingredient_id", "nutrition_id",
    ];
}
