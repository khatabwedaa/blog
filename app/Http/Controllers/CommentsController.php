<?php

namespace App\Http\Controllers;

use Session;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$post_id)
    {
        $request->validate(array(
            'name'    => 'required|max:255',
            'email'   => 'required|email|max:255',
            'comment' => 'required|min:5|max:2000'
        ));

        $comment = new Comment();

        $post = Post::find($post_id);

        $comment->name     =  $request->name;
        $comment->email    =  $request->email;
        $comment->comment   =  $request->comment;
        $comment->approved =  true;
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('Succcess' , 'Comment Was Add');

        return redirect()->route('blog.single' ,$post->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.edit' , compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $request->validate(array('comment' => 'required'));

        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('Succcess' , 'Comment Updated');

        return redirect()->route('posts.show' , $comment->post->id);
    }

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comments.delete' , compact('comment')) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        $post_id = $comment->post->id;

        $comment->delete();

        Session::flash('Succcess' , 'Comment Deleted');

        return redirect()->route('posts.show' , $post_id);
    }
}
