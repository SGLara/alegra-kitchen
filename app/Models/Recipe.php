<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Recipe extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        //
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        //
    ];

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */
    // /** @return Attribute<string, string> */ Getter and setter
    // /** @return Attribute<string, never> */ Only getter
    // /** @return Attribute<never, string> */ Only setter
    // protected function fullName(): Attribute

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    // public function scopeActive(Builder $query): void

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function ingredients(): HasMany
    {
        return $this->hasMany(IngredientRecipe::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Other Methods
    |--------------------------------------------------------------------------
    */
}
