<?php

namespace App\Http\Controllers\Dashbord;

use Session;
use App\Post;
use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    public function store()
    {
        request()->validate(array('name' => 'required|max:255',));

        Category::create(['name' => request('name')]);

        Session::flash('Succcess', 'The Category has been created!');

        return redirect()->route('categories.index');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('categories.edit', compact('category'));
    }

    public function update($id)
    {
        $category = Category::findOrFail($id);

        request()->validate(array('name' => 'required|max:255'));

        $category->Category::update(['name' => request('name')]);

        Session::flash('Succcess', 'The Category Was Updated!');

        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        Post::whereCategoryId($id)->update(['category_id' => null]);

        $category->delete();

        Session::flash('Succcess', 'The post was successfully Deleted!');

        return redirect()->route('categories.index');
    }
}