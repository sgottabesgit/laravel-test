@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">Edit Article</h1>

    <form method="POST" action="{{ route('articles.update', $article->id) }}">
        @csrf
        @method('PUT')

        <!-- Title Input -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $article->title) }}" 
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- URL Input -->
        <div class="mb-4">
            <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
            <input type="url" id="url" name="url" value="{{ old('url', $article->url) }}" 
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
            @error('url')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Update Article
            </button>
        </div>
    </form>
</div>
@endsection
