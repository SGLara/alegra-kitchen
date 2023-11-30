<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Dish
 */
class DishResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'recipe' => RecipeResource::make($this->whenLoaded('recipe')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
