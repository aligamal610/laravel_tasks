<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //( Pagination + Eager Loading)
    public function index(Request $request)
    {
        $posts = Post::with('user')->orderByDesc('created_at')->paginate(10);
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);
        return new PostResource($post);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
        ]);

        $data['user_id'] = $request->user()->id;

        $post = Post::create($data);

        return new PostResource($post);
    }
}
