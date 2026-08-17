<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\IngredientCategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipeCategoryController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\StepController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//<editor-fold desc="ingredients">
Route::apiResource("/ingredients/categories",
    IngredientCategoryController::class)
    ->only("index")
    ->middleware('auth:sanctum');
Route::post("/ingredients", [IngredientController::class, "index"])
    ->middleware('auth:sanctum');
Route::get("/ingredients/{ingredient}", [IngredientController::class, "show"])
    ->middleware('auth:sanctum');
Route::post("/categorized_ingredients", [IngredientController::class, "byCategoryIndex"])
    ->middleware("auth:sanctum");
//</editor-fold>

//<editor-fold desc="recipes">
Route::apiResource("/recipes/categories",
    RecipeCategoryController::class)
    ->only("index")
    ->middleware('auth:sanctum');
Route::post("/recipes", [RecipeController::class, "index"])
    ->middleware("auth:sanctum");
Route::get("/recipes/{recipe}", [RecipeController::class, "show"])
    ->middleware('auth:sanctum');
Route::post("/categorized_recipes", [RecipeController::class, "byCategoryIndex"])
    ->middleware("auth:sanctum");
Route::post("/recipes/summary", [RecipeController::class, "summaryRecipes"])
    ->middleware("auth:sanctum");
// steps
Route::get("recipes/steps/{step}", [StepController::class, "show"])
    ->middleware("auth:sanctum");
Route::post("recipes/steps", [StepController::class, "index"])
    ->middleware("auth:sanctum");
//</editor-fold>

//<editor-fold desc="user data">
// ingredients
Route::post("/user/ingredients", [UserController::class, "ingredients"])
    ->middleware("auth:sanctum");
Route::post("/user/ingredients/group_insert", [UserController::class, "insertUserIngredients"])
    ->middleware("auth:sanctum");
Route::put("user/ingredients/{ingredient}", [UserController::class, "insertUserIngredient"])
    ->middleware("auth:sanctum");
Route::delete("user/ingredients/clear", [UserController::class, "clearUserIngredientList"])
    ->middleware("auth:sanctum");
Route::delete("user/ingredients/{ingredient}", [UserController::class, "deleteUserIngredient"])
    ->middleware("auth:sanctum");
// shopping
Route::post("/user/shopping", [UserController::class, "shopping"])
    ->middleware("auth:sanctum");
Route::put("/user/shopping/{ingredient}", [UserController::class, "insertShoppingIngredient"])
    ->middleware("auth:sanctum");
Route::delete("user/shopping/clear", [UserController::class, "clearUserShoppingList"])
    ->middleware("auth:sanctum");
Route::delete("/user/shopping/{ingredient}", [UserController::class, "deleteShoppingIngredient"])
    ->middleware("auth:sanctum");
Route::patch("user/shopping/{ingredient}", [UserController::class, "changeUserShoppingIngredientCompletion"])
    ->middleware("auth:sanctum");
// recipes
Route::post("/user/recipes/favorites", [UserController::class, "favoriteRecipes"])
    ->middleware("auth:sanctum");
//Route::post("/user/recipes/favorites/group_insert", [UserController::class, "insertRecipesToFavorites"])
//    ->middleware("auth:sanctum");
Route::put("user/recipes/favorites/{recipe}", [UserController::class, "insertRecipeToFavorites"])
    ->middleware("auth:sanctum");
Route::delete("user/recipes/favorites/{recipe}", [UserController::class, "deleteRecipeFromFavorites"])
    ->middleware("auth:sanctum");
//</editor-fold>

//Route::apiResource("/recipes/steps",
//    StepController::class)
//    ->only("index", "show");
