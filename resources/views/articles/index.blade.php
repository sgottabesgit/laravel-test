<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    @auth
        <!-- Header -->
        <header class="bg-gray-800 text-white py-4 shadow-md">
            <div class="max-w-7xl mx-auto flex justify-between items-center px-6">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logo.webp') }}" alt="Your Logo" class="h-16 w-auto">
                    </a>
                </div>

                <!-- User Info -->
                <div class="flex items-center space-x-4">
                    <span class="font-semibold text-lg">{{ __('Welcome, ') . Auth::user()->name }}</span>
                    <a href="{{ route('profile.edit') }}" class="text-blue-400 hover:underline">Edit Profile</a>
                </div>

                <!-- Logout -->
                <div>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-400 hover:underline ml-4">Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Create Article Form -->
        <div class="max-w-7xl mx-auto px-6 py-6">
            <h2 class="text-2xl font-semibold mb-4">Create a New Article</h2>
            <form method="POST" action="{{ route('articles.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="w-full p-3 border border-gray-300 rounded-md" required>
                </div>
                <div>
                    <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                    <input type="url" name="url" id="url" class="w-full p-3 border border-gray-300 rounded-md" required>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
                        Create Article
                    </button>
                </div>
            </form>
        </div>
    @endauth

    <!-- Articles Section -->
    <div class="max-w-7xl mx-auto px-6 py-6">
        <h1 class="text-3xl font-semibold text-center mb-6">Recent Articles</h1>

        @if($articles->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($articles as $article)
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
                        <h2 class="text-xl font-bold mb-3">
                            <a href="{{ route('articles.show', $article->id) }}" class="text-blue-500 hover:underline">{{ $article->title }}</a>
                        </h2>
                        <p class="text-gray-600">Published on: {{ $article->created_at->format('F j, Y') }}</p>
                        <p class="text-gray-600">Views: {{ $article->views }}</p>

                        <!-- Conditionally render edit and delete buttons -->
                        @if (Auth::id() === $article->user_id)
                            <!-- Edit Button -->
                            <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-500 hover:underline mt-4 block">Edit</a>

                            <!-- Delete Button -->
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline mt-2 block">Delete</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-600">No articles available.</p>
        @endif
    </div>

    <!-- Back to Dashboard Link -->
    <div class="text-center my-6">
        <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition">
            Back to Dashboard
        </a>
    </div>
</body>
</html>
