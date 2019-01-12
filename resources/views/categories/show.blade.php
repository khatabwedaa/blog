@extends('main')

@section('title' , "| $category->name Category")

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $category->name }} <small class="badge badge-pill badge-dark">{{ $category->posts->count() }} Post</small></h1>
        </div>
        <div class="col-md- offset-md-1" style="margin-top:20px;">
            <a href="{{ route('tags.edit' , $category->id) }}" class="btn btn-warning  btn-sm">Edit</a>
        </div>

        <div class="col-md-2 " style="margin-top:20px;">
            <form action="{{ URL::route('tags.destroy', [$category->id]) }}" method="post">
                @csrf
                {{ method_field('delete') }}

                <input type="submit" value="Delete" class="btn btn-danger btn-sm">

            </form>
        </div>
    </div>

    <div class="col-md-12"><hr></div>

        <div class="col-md-12">
            <table class="table table-striped table-dark">
                <thead>
                    <th>#</th>
                    <th>Post</th>
                    <th>Created At</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($category->posts as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->title }}</td>
                        <td>{{ date('M j, Y h:ia', strtotime($category->created_at)) }}</td>
                        <td><a href="{{ route('posts.show', $category->id) }}" class="btn btn-light btn-sm">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
