<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
 <a href="{{ route('posts.index') }}">All Posts</a>

    <h1>Create Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div>
            <label>Title</label><br>
            <input type="text" name="title" value="{{ old('title') }}">
        </div>

        <div>
            <label>Body</label><br>
            <textarea name="body" rows="4" cols="40">{{ old('body') }}</textarea>
        </div>

        <button type="submit">Submit</button>
    </form>
</body>
</html>