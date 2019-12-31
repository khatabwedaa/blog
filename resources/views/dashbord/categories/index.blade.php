@extends('layouts.master')

@section('title' , '| All Categories')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1>All Categories</h1>
            <hr>
            <table class="table table-striped table-dark"><!--table-striped table-dark-->
                <thead class="thead">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td><a href="{{ route('categories.show' , $category->id) }}">{{ $category->name }}</a></td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div><!--end the dev one-->

        <div class="col-md-3">
            <div class="alert alert-secondary">
                <h3>New Category</h3>
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <label for="name">Name :</label>
                    <input type="text" name="name" class="form-control" required maxlength="25">
                    <br>
                    <input type="submit" value="Create New Category" class="btn btn-info btn-block">
                </form>
            </div>
        </div>
    </div>
@endsection
