<?php

namespace App\Http\Controllers\Blog;

use App\Post;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();

        return view('blog.show', compact('post'));
    }
}
