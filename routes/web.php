<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route to show the articles on the home page
Route::get('/', [ArticleController::class, 'index'])->name('articles.index');

// Additional routes for creating, updating, and deleting articles (if needed)

Route::get('/articles/create', function () {
    return view('articles.create'); // This view can contain a form to create new articles
})->name('articles.create');

Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

// Optional: route to update an article, you'd need a form for that
Route::get('/articles/{id}/edit', function ($id) {
    // Fetch the article and pass it to the edit view
    $article = \App\Models\Article::findOrFail($id);
    return view('articles.edit', compact('article'));
})->name('articles.edit');

Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');

// Route to delete an article
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');

// You can add more routes as needed for other parts of your app, such as a dashboard or admin pages.

