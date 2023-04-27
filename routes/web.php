<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndoRecipeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndoRecipeController::class, 'index'])->name('home');
Route::get('search-result', [IndoRecipeController::class, 'searchResult'])->name('search-result');
Route::get('show-by-category/{categoryId}', [IndoRecipeController::class, 'showByCategory'])->name('show-by-category');
Route::get('show-by-origin/{originId}', [IndoRecipeController::class, 'showByOrigin'])->name('show-by-origin');
Route::get('detail-recipe/{recipeName}/{recipeId}', [IndoRecipeController::class, 'detailRecipe'])->name('detail-recipe');
Route::get('about', [IndoRecipeController::class, 'about'])->name('about');
Route::get('contact', [IndoRecipeController::class, 'contact'])->name('contact');


