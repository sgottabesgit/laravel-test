<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }}</title>
</head>
<body>
    <h1>{{ $article->title }}</h1>
    <p><strong>URL:</strong> <a href="{{ $article->url }}" target="_blank">{{ $article->url }}</a></p>
    <p><strong>Views:</strong> {{ $article->views }}</p>
    <p><strong>Published on:</strong> {{ $article->created_at->format('F j, Y') }}</p>

    <a href="{{ route('articles.index') }}">Back to articles</a>
</body>
</html>
