<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Article Routes
Route::prefix('v1/articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index']);          // Get all articles
    Route::post('/', [ArticleController::class, 'store']);         // Store a new article
    Route::get('/{id}', [ArticleController::class, 'show']);       // Get a specific article
    Route::put('/{id}', [ArticleController::class, 'update']);     // Update a specific article
    Route::delete('/{id}', [ArticleController::class, 'destroy']); // Delete a specific article
});
