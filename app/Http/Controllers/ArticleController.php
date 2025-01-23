<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class ArticleController extends Controller
{
    /**
     * Display a listing of the most recent 15 articles.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')
            ->take(15)
            ->get();

        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new article.
     */
    public function create()
    {
        return view('articles.create'); // Render the article creation form view
    }

    /**
     * Store a newly created article in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:64',
            'url' => 'required|url|max:1024',
        ]);

        $article = Article::create([
            'title' => $request->input('title'),
            'url' => $request->input('url'),
            'views' => 0,
            'user_id' => Auth::id(),  // Associate the article with the authenticated user
        ]);

        return redirect()->route('articles.index')->with('success', 'Article created successfully');
    }

    /**
     * Display a specific article and increment its view count.
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $article->increment('views');

        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing a specific article.
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        // Ensure that the authenticated user is the author of the article
        if ($article->user_id !== Auth::id()) {
            return redirect()->route('articles.index')->with('error', 'Unauthorized');
        }

        return view('articles.edit', compact('article'));
    }

    /**
     * Update a specific article.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|max:64',
            'url' => 'nullable|url|max:1024',
        ]);

        $article = Article::findOrFail($id);

        // Ensure that the authenticated user is the author of the article
        if ($article->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403); // 403 Forbidden
        }

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
    public function destroy($id)
    {
        // Find the article
        $article = Article::find($id);

        // If the article exists, delete it
        if ($article) {
            $article->delete();

            // Redirect with a success message
            return redirect()->route('articles.index')
                             ->with('message', 'Article deleted successfully');
        }

        // If the article isn't found, redirect back with an error message
        return redirect()->route('articles.index')
                         ->with('error', 'Article not found');
    }
}
