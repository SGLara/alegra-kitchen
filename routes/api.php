<?php

use App\Http\Controllers\DishController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::group([
    'controller' => RecipeController::class,
    'prefix' => 'recipes',
], function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
});

Route::get('dishes', DishController::class);
