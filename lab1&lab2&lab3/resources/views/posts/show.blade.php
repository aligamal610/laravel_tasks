@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            @if ($post->image_path)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post image" style="max-width: 300px;">
                </div>
            @endif
            <h3 class="mb-0">{{ $post->title }}</h3>
            <small class="text-muted">
                Created at:
                {{ $post->created_at ? $post->created_at->format('Y-m-d H:i') : '' }}
            </small>
        </div>
        <div class="card-body">
            <p>{{ $post->body }}</p>
        </div>
    </div>

    <div class="mb-4">
        <h4>Comments</h4>

        @forelse ($post->comments as $comment)
            <div class="card mb-2">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-1">{{ $comment->body }}</p>
                        <small class="text-muted">
                            {{ $comment->created_at?->diffForHumans() }}
                        </small>
                    </div>
                    <div>
                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('comments.destroy', $comment->id) }}"
                              method="POST"
                              style="display:inline-block"
                              onsubmit="return confirm('Delete this comment?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">No comments yet.</p>
        @endforelse
    </div>

    <div class="card mb-3">
        <div class="card-header">
            Add Comment
        </div>
        <div class="card-body">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf

                {{-- foreign key --}}
                <input type="hidden" name="post_id" value="{{ $post->id }}">

                <div class="mb-3">
                    <textarea name="body" rows="3" class="form-control" placeholder="Write a comment...">{{ old('body') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Add Comment</button>
            </form>
        </div>
    </div>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to All Posts</a>
@endsection
