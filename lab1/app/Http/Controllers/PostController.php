<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = [
            ['id' => 1, 'title' => 'First Post',  'body' => 'This is the first post'],
            ['id' => 2, 'title' => 'Second Post', 'body' => 'This is the second post'],
            ['id' => 3, 'title' => 'Third Post',  'body' => 'This is the third post'],
        ];

        return view('posts.index', ['data' => $data]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = [
            ['id' => 1, 'title' => 'First Post',  'body' => 'This is the first post'],
            ['id' => 2, 'title' => 'Second Post', 'body' => 'This is the second post'],
            ['id' => 3, 'title' => 'Third Post',  'body' => 'This is the third post'],
        ];

        $nextId = count($data) + 1;

        $data[] = [
            'id'    => $nextId,
            'title' => $request->title,
            'body'  => $request->body,
        ];

        return view('posts.index', [
            'data' => $data,
        ]);
    }

    public function show($id)
    {
        $data = [
            ['id' => 1, 'title' => 'First Post',  'body' => 'This is the first post'],
            ['id' => 2, 'title' => 'Second Post', 'body' => 'This is the second post'],
            ['id' => 3, 'title' => 'Third Post',  'body' => 'This is the third post'],
        ];

        $post = null;

        foreach ($data as $item) {
            if ($item['id'] == $id) {
                $post = $item;
                break;
            }
        }

        if ($post === null) {
            abort(404);
        }

        return view('posts.show', ['post' => $post]);
    }

    public function edit($id)
    {
        $data = [
            ['id' => 1, 'title' => 'First Post',  'body' => 'This is the first post'],
            ['id' => 2, 'title' => 'Second Post', 'body' => 'This is the second post'],
            ['id' => 3, 'title' => 'Third Post',  'body' => 'This is the third post'],
        ];

        $post = null;

        foreach ($data as $item) {
            if ($item['id'] == $id) {
                $post = $item;
                break;
            }
        }

        if ($post === null) {
            abort(404);
        }

        return view('posts.edit', ['post' => $post]);
    }
    
    public function update(Request $request, $id)
    {
        $data = [
            ['id' => 1, 'title' => 'First Post',  'body' => 'This is the first post'],
            ['id' => 2, 'title' => 'Second Post', 'body' => 'This is the second post'],
            ['id' => 3, 'title' => 'Third Post',  'body' => 'This is the third post'],
        ];

        foreach ($data as $index => $post) {
            if ($post['id'] == $id) {
                $data[$index]['title'] = $request->title;
                $data[$index]['body']  = $request->body;
                break;
            }
        }

        return view('posts.index', [
            'data' => $data,
        ]);
    }

    public function destroy($id)
    {
        $data = [
            ['id' => 1, 'title' => 'First Post',  'body' => 'This is the first post'],
            ['id' => 2, 'title' => 'Second Post', 'body' => 'This is the second post'],
            ['id' => 3, 'title' => 'Third Post',  'body' => 'This is the third post'],
        ];

        foreach ($data as $index => $post) {
            if ($post['id'] == $id) {
                unset($data[$index]);
                break;
            }
        }

        $data = array_values($data);

        return view('posts.index', [
            'data' => $data,
        ]);
    }
}
