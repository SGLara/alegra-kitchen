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
            now()->addSeconds(15),
            function () {
                return Recipe::with('ingredients')->get();
            }
        );

        return RecipeResource::collection($recipes);
    }

    public function store(): OrderResource
    {
        $randomRecipe = Cache::remember(
            'recipes',
            now()->addSeconds(15),
            function () {
                return Recipe::with('ingredients')->get();
            }
        )->random();

        $necessaryIngredients = $randomRecipe
            ->ingredients
            ->pluck('quantity', 'ingredient_name')
            ->toArray();

        $ingredients = $this->warehouseService->getIngredients($necessaryIngredients);

        $this->warehouseService->useIngredients($ingredients->pluck('name')->toArray());

        $randomRecipe->dishes()->create([
            'is_ready' => true
        ]);

        return OrderResource::make($randomRecipe);
    }
}
