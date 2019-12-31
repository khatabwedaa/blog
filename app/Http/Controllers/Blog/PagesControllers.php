<?php

namespace App\Http\Controllers\Blog;

use App\Post;
use App\Http\Controllers\Controller;

class PagesControllers extends Controller
{
    public function index(Post $posts)
    {
        $posts = Post::latest()->paginate(20);

        return view('pages.index', compact('posts'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
