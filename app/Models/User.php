<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "avatar_media_id"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        "pivot",
        "avatar_media_id",
        "email_verified_at",
        "created_at",
        "updated_at"
    ];

    protected $appends = [
        "avatar"
    ];

    public function getAvatarAttribute()
    {
        return url("storage/" . $this->avatar_media()?->first()?->path);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(
            Ingredient::class,
            "user_and_ingredients",
            "user_id",
            "ingredient_id",
        );
    }

    public function shopping(): BelongsToMany
    {
        return $this->belongsToMany(
            Ingredient::class,
            "shopping_and_users",
            "user_id",
            "ingredient_id"
        )->withPivot(["is_done"]);
    }

    public function favoriteRecipes(): BelongsToMany
    {
        return $this->belongsToMany(
            Recipe::class,
            "user_favorite_recipes",
            "user_id",
            "recipe_id"
        );
    }

    public function avatar_media()
    {
        return $this->belongsTo(
            Media::class,
            "avatar_media_id",
            "id"
        );
    }
}
