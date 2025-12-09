@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Edit Comment</h1>

    <div class="mb-3">
        <p><strong>Post:</strong> {{ $post->title }}</p>
    </div>

    <form action="{{ route('comments.update', $comment->id) }}" method="POST" class="card card-body">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Comment</label>
            <textarea name="body" rows="3" class="form-control">{{ old('body', $comment->body) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Comment</button>
    </form>
@endsection
