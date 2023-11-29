<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class WarehouseService
{
    public function getIngredients(array $ingredients): Collection
    {
        $response = Http::warehouse()->get('/ingredients', [
            'ingredients' => $ingredients
        ]);

        if ($response->clientError()) {
            $response->throw();
        }

        return collect($response->json(key: 'data'));
    }

    public function useIngredients(array $ingredients): array
    {
        $response = Http::warehouse()->patch('/ingredients', [
            'ingredients' => $ingredients
        ]);

        if ($response->clientError()) {
            $response->throw();
        }

        return $response->json();
    }
}
