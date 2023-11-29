<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Recipe;
use App\Services\WarehouseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class RecipeController extends Controller
{
    public function __construct(
        private WarehouseService $warehouseService
    ) {
    }

    public function __invoke(): OrderResource|JsonResponse
    {
        $randomRecipe = Cache::remember(
            'randomRecipe',
            now()->addMinutes(5),
            function () {
                return Recipe::with('ingredients')->get();
            }
        )->random();

        $necessaryIngredients = $randomRecipe
            ->ingredients
            ->pluck('quantity', 'ingredient_name')
            ->toArray();

        $ingredients = $this->warehouseService->getIngredients($necessaryIngredients);

        $ingredientsReady = $ingredients->every(
            function (array $ingredient) use ($necessaryIngredients) {
                return $ingredient['available_units'] >= $necessaryIngredients[$ingredient['name']];
            }
        );

        if ($ingredientsReady) {
            return OrderResource::make($randomRecipe);
        }

        return response()->json(['message' => 'Ingredients not available, please try again later'], 204);
    }
}
