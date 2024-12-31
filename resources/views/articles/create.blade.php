<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
</head>
<body>
    <h1>Create New Article</h1>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="url">URL:</label>
        <input type="url" id="url" name="url" required><br><br>

        <button type="submit">Create Article</button>
    </form>

    <a href="{{ route('articles.index') }}">Back to articles</a>
</body>
</html>
