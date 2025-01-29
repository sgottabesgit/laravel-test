<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        function ensureHttps(input) {
            let value = input.value.trim();
            if (value && !/^https?:\/\//i.test(value)) {
                input.value = 'https://' + value;
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    @auth
        <header class="bg-gray-800 text-white py-4 shadow-md">
            <div class="max-w-7xl mx-auto flex justify-between items-center px-6">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logo.webp') }}" alt="Your Logo" class="h-16 w-auto">
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="font-semibold text-lg">{{ __('Welcome, ') . Auth::user()->name }}</span>
                    <a href="{{ route('profile.edit') }}" class="text-blue-400 hover:underline">Edit Profile</a>
                </div>
                <div>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-400 hover:underline ml-4">Logout</button>
                    </form>
                </div>
            </div>
        </header>
    @endauth

    <div class="max-w-7xl mx-auto px-6 py-6">
        <h1 class="text-3xl font-semibold text-center mb-6">Create New Article</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('articles.store') }}" method="POST" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required maxlength="64">
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                <input type="url" name="url" id="url" value="{{ old('url') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" required maxlength="1024" onblur="ensureHttps(this)">
                @error('url')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Create Article</button>
        </form>
    </div>
</body>
</html>
