<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('recipes', RecipeController::class);
