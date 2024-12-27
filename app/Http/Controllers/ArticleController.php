<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the most recent 15 articles.
     */
    public function index(): JsonResponse
    {
        $articles = Article::orderBy('created_at', 'desc')
            ->take(15)
            ->get();
        return response()->json($articles);
    }

    /**
     * Store a newly created article in the database.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'title' => 'required|max:64',
            'url' => 'required|url|max:1024',
        ]);

        $article = Article::create([
            'title' => $request->input('title'),
            'url' => $request->input('url'),
            'views' => 0,
        ]);

        return response()->json($article, 201); // 201 Created
    }

    /**
     * Display a specific article and increment its view count.
     */
    public function show($id): JsonResponse
    {
        $article = Article::findOrFail($id);
        $article->increment('views');
        return response()->json($article);
    }

    /**
     * Update a specific article.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'title' => 'nullable|max:64',
            'url' => 'nullable|url|max:1024',
        ]);

        $article = Article::findOrFail($id);

        if ($request->has('title')) {
            $article->title = $request->input('title');
        }
        if ($request->has('url')) {
            $article->url = $request->input('url');
        }
        $article->save();

        return response()->json($article);
    }

    /**
     * Remove a specific article from the database.
     */
    public function destroy($id): JsonResponse
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return response()->json(['message' => 'Article deleted successfully']);
    }
}
