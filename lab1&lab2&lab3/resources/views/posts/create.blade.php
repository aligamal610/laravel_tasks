@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Create Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST" class="card card-body" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body" rows="4" class="form-control">{{ old('body') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image (.jpg, .png)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
