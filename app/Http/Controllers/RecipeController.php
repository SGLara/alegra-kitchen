<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Http\Resources\RecipeResource;
use App\Models\Recipe;
use App\Services\WarehouseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Cache;

class RecipeController extends Controller
{
    public function __construct(
        private WarehouseService $warehouseService
    ) {
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $recipes = Cache::remember(
            'recipes',
            now()->addMinutes(5),
            function () {
                return Recipe::with('ingredients')->get();
            }
        );

        return RecipeResource::collection($recipes);
    }

    public function store(): OrderResource|JsonResponse
    {
        $randomRecipe = Cache::remember(
            'recipes',
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

        $this->warehouseService->useIngredients($ingredients->pluck('name')->toArray());

        if ($ingredientsReady) {
            return OrderResource::make($randomRecipe);
        }

        return response()->json(['message' => 'Ingredients not available, please try again later'], 204);
    }
}
