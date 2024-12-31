<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>
<body>
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
