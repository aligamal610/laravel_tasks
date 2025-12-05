<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
       <form action="{{ route('posts.update', $post['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Title</label><br>
            <input type="text" name="title" value="{{ old('title', $post['title']) }}">
        </div>
        <div>
            <label>Body</label><br>
            <textarea name="body" rows="4" cols="40">{{ old('body', $post['body']) }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>