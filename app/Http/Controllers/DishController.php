<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishRequest;
use App\Http\Resources\DishResource;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Collection;

class DishController extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return DishResource::collection(
            Dish::with('recipe')->get()
        );
    }
}
