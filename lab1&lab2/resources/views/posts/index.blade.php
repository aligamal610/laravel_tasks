@extends('layouts.app')

@section('content')
    <h1 class="mb-3">All Posts</h1>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->body, 50) }}</td>
                    <td>
                        {{ $post->created_at ? $post->created_at->format('Y-m-d H:i') : '' }}
                        {{-- أو:
                        {{ $post->created_at?->diffForHumans() }}
                        --}}
                    </td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">Show</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('posts.destroy', $post->id) }}"
                              method="POST"
                              style="display:inline-block"
                              onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
@endsection
