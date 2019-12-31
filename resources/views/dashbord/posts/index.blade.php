@extends('layouts.master')

@section('title' , '| All Posts')

@section('content')

    <div class="row">{{-- menu in the top start --}}
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-block btn-info">Create New Post</a>
        </div>

        <div class="col-md-12">
            <hr>
        </div>
    </div>{{-- menu in the top end --}}

    <div class="row">{{-- table start --}}
        <div class="col-md-12">
            <table class="table table-striped table-dark ">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th></th>
                </thead>
                <tbody>
                        @foreach ($posts as $postitem)
                           <tr>
                               <th>{{ $postitem->id }}</th>
                               <td>{{ substr($postitem->title, 0, 30) }}{{ strlen($postitem->title) > 30 ? "..." : ""}}</td>
                               <td>{{  substr(strip_tags($postitem->body), 0, 60) }}{{ strlen(strip_tags($postitem->body)) > 50 ? "..." : ""}}</td>
                               <td>{{ date('M j, Y h:ia', strtotime($postitem->created_at)) }}</td>
                               <td><a href="{{ route('posts.show', $postitem->id) }}" class="btn btn-info btn-sm">View</a> <a href="{{ route('posts.edit', $postitem->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                           </tr>
                        @endforeach
                    </tbody>
            </table>
            <div class="text-center" style="padding-left:50ch ;">
                {!! $posts->links(); !!}
            </div>
        </div>
    </div>{{-- table end --}}

@endsection
