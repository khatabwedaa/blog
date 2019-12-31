<?php

namespace App\Http\Controllers\Blog;

use Session;
use App\Post;
use App\Comment;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }

    public function store($post_id)
    {
        request()->validate(array(
            'name'    => 'required|max:255',
            'email'   => 'required|email|max:255',
            'comment' => 'required|min:5|max:2000'
        ));

        $comment = new Comment();

        $post = Post::find($post_id);

        $comment->name     = request()->name;
        $comment->email    = request()->email;
        $comment->comment   = request()->comment;
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('Succcess', 'Comment Was Add');

        return redirect()->route('blog.single', $post->slug);
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.edit', compact('comment'));
    }

    public function update($id)
    {
        $comment = Comment::findOrFail($id);

        request()->validate(array('comment' => 'required'));

        $comment->update(['comment' => request('comment')]);

        Session::flash('Succcess', 'Comment Updated');

        return redirect()->route('posts.show', $comment->post->id);
    }

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.delete', compact('comment')) ;
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        $post_id = $comment->post->id;

        $comment->delete();

        Session::flash('Succcess', 'Comment Deleted');

        return redirect()->route('posts.show', $post_id);
    }
}
