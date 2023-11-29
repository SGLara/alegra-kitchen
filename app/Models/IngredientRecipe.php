<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class IngredientRecipe extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'quantity',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        //
    ];

    protected $attributes = [
        'quantity' => 1
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
    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Other Methods
    |--------------------------------------------------------------------------
    */
}
