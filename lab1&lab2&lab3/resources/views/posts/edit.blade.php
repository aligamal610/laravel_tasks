@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Edit Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="card card-body" enctype="multipart/form-data">
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

        <div class="mb-3">
            <label class="form-label">Image (.jpg, .png)</label>
            <input type="file" name="image" class="form-control">

            @if ($post->image_path)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post image" style="max-width: 200px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
