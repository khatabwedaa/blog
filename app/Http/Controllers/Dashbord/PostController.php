<?php

namespace App\Http\Controllers\Dashbord;

use App\Tag;
use Session;
use App\Post;
use App\Category;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(20);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('posts.create', compact('categories', 'tags'));
    }

    public function store()
    {
        request()->validate(array(
            'title'       => 'required|max:255',
            'slug'        => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body'        => 'required',
            'image'       => 'sometimes|image'
        ));

        $post = Post::create([
            'title' => request('title'),
            'slug' => request('slug'),
            'category_id' => request('category_id'),
            'body' => request('body'),
            'image' => ''
        ]);

        $post->tags()->sync(request('tags'), false);

        Session::flash('Succcess', 'The blog post was successfully save!');

        return redirect('/blog/' . $post->slug);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories = Category::all();

        $tags = Tag::all();

        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update($id)
    {
        request()->validate(array(
            'title'       => 'required|max:255',
            'category_id' => 'required|integer',
            'body'        => 'required',
            'image'       => 'sometimes|image',
        ));
        $post = Post::findOrFail($id);

        $image = Post::imageUpdate($post->image , request()->file('image'));

        $post->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'category_id' => request('category_id'),
            'body' => Purifier::clean(request('body')),
            'image' => $image
        ]);

        $post->tags()->sync(request()->tags);

        Session::flash('Succcess', 'The blog post was successfully Updated!');

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        Post::safeDelete($post);

        Session::flash('Succcess', 'The post was successfully Deleted!');

        return redirect()->route('posts.index');
    }
}
