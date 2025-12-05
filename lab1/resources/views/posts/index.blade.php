<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
</head>
<body>
    <h1>All Posts</h1>
    <p>
        <a href="{{ route('posts.create') }}">Create New Post</a>
    </p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $post)
                <tr>
                    <td>{{ $post['id'] }}</td>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['body'] }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post['id']) }}">Show</a>
                        <a href="{{ route('posts.edit', $post['id']) }}">Edit</a>

                        <form action="{{ route('posts.destroy', $post['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
