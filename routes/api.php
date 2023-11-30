<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'controller' => RecipeController::class,
    'prefix' => 'recipes',
], function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
});
