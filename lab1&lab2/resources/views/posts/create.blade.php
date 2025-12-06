@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Create Post</h1>

    <form action="{{ route('posts.store') }}" method="POST" class="card card-body">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body" rows="4" class="form-control">{{ old('body') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
