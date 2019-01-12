@extends('main')

@section('title', '| View Post')

@section('stylesheets')
    <link rel="stylesheet" href="{{  URL::asset('css/all.min.css') }}">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>

            <hr>

            <div class="tag">
                    <span class="badge badge-pill badge-info">Tags --</span>
                @foreach ($post->tags as $tag)
                    <span class="badge badge-pill badge-secondary">{{ $tag->name }}</span>
                @endforeach
            </div>

            <div class="backend-comments" style="margin-top:10px;">
                <h2 class="comment-num badge badge-pill badge-secondary">{{ $post->comments->count() }} -- Comments</h2>

                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th style="width:100px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($post->comments as $comment)
                            <tr>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->email }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>
                                    <a href="{{ route('comments.edit' , $comment->id) }}" class="btn btn-warning btn-sm"><span><i class="fas fa-pen"></i></span></a>
                                    <a href="{{ route('comments.delete' , $comment->id) }}" class="btn btn-danger btn-sm"><span><i class="fas fa-trash"></i></span></a>
                                </td>
                            </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="alert alert-secondary">
                <dl class="dl-horizontal">
                     <dt>Url:</dt>
                    <dd> <a href="{{ url("blog/" . $post->slug) }}">{{ url("blog/" .$post->slug) }}</a></dd>
                </dl>

                <dl class="dl-horizontal" >
                        <dt>Category:</dt>
                        <dd>{{ isset($post->category->name)  == null  ? "N_A" : $post->category->name }}</dd>
                    </dl>

                <dl class="dl-horizontal">
                    <dt>Create At:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Updated At:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>


                <hr>
                <div class="row">
                    <div class="col-sm-6">

                        <a href="{{ URL::route('posts.edit', [$post->id]) }}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6">
                            <form action="{{ URL::route('posts.destroy', [$post->id]) }}" method="post">
                                @csrf
                                {{ method_field('delete') }}

                                <input type="submit" value="Delete" class="btn btn-danger btn-block">

                             </form>
                    </div>

                </div>
                <div class="row">
                    <div class="col-sm-12" style="margin-top:8px;">

                        <a href="{{ URL::route('posts.index', [$post->id]) }}" class="btn btn-light btn-block">See All Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
