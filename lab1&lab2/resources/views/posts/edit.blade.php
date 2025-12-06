@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="card card-body">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title', $post->title) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body" rows="4" class="form-control">{{ old('body', $post->body) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
