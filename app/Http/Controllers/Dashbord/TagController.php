<?php

namespace App\Http\Controllers\Dashbord;

use App\Tag;
use Session;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', compact('tags'));
    }

    public function store()
    {
        request()->validate(array('name' => 'required|max: 255'));

        Tag::create(['name' => request('name')]);

        Session::flash('Succcess', 'The Tag Was Created!');

        return redirect()->route('tags.index');
    }

    public function show($id)
    {
        $tag = Tag::findOrFail($id);

        return view('tags.show', compact('tag'));
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return view('tags.edit', compact('tag'));
    }

    public function update($id)
    {
        $tag = Tag::findOrFail($id);

        request()->validate(array('name' => 'required|max:255'));

        $tag->update(['name' => request('name')]);

        Session::flash('Succcess', 'The Tag Was Updated!');

        return redirect()->route('tags.show', $tag->id);
    }

    public function destroy($id)
    {
        $tag =Tag::find($id);

        $tag->posts()->detach();

        $tag->delete();

        Session::flash('Succcess', 'The Tag was successfully Deleted!');

        return redirect()->route('tags.index');
    }
}
