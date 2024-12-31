<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>
<body>
    @auth
        <header class="bg-gray-800 text-white py-2">
            <div class="max-w-7xl mx-auto flex justify-between items-center px-4 sm:px-6 lg:px-8">
                <div>
                    Logged in as: <strong>{{ Auth::user()->name }}</strong>
                </div>
                <div>
                    <a href="{{ route('profile.edit') }}" class="text-blue-400 hover:underline">Edit Profile</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-400 hover:underline ml-4">Logout</button>
                    </form>
                </div>
            </div>
        </header>
    @endauth

    <!-- Back to Dashboard Link -->
    <div class="mt-6 text-center">
        <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">
            Back to Dashboard
        </a>
    </div>

    <h1>Recent Articles</h1>

    @if($articles->count() > 0)
        <ul>
            @foreach($articles as $article)
                <li>
                    <h2><a href="{{ route('articles.show', $article->id) }}" target="_blank">{{ $article->title }}</a></h2>
                    <p>Published on: {{ $article->created_at->format('F j, Y') }}</p>
                    <p>Views: {{ $article->views }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>No articles available.</p>
    @endif
</body>
</html>
