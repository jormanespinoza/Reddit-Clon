<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('posts.index')->with(['posts' => $posts]);
    }

    public function show(Post $post)
    {                           
        return view('posts.show')->with(['post' => $post]);                
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(CreatePostRequest $request)
    {   
        /*     
        |   $post = new Post;
        |   $post->title = $request->get('title');
        |   $post->description = $request->get('description');
        |   $post->url = $request->get('url');
        |   $post->save();
        */

        $post = Post::create($request->only('title', 'description', 'url'));

        return redirect()->route('posts_path');
    }

    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }

    public function update(Post $post, UpdatePostRequest $request)
    {
        $post->update($request->only('title', 'description', 'url'));
        return redirect()->route('post_path', ['post' => $post->id]);
    }

    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('posts_path');
    }
}
