@extends('layouts.master')

@section('title' , "| $post->slug ")

@section('stylesheets')
    <link rel="stylesheet" href="{{  URL::asset('css/all.min.css') }}">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <img src="{{ asset('images/' . $post->image) }}" class="img-fluid" height="500" width="800" style="border-radius:5px">
            <hr>
            <span class="badge badge-pill badge-info">Post --</span> <h3 class="badge badge-pill badge-secondary">{{ $post->title }}</h3>
            <p class="text-style">{!! $post->body !!}</p>
            <hr>
            <div class="tag">
                    <span class="badge badge-pill badge-info">Tags --</span>
                @foreach ($post->tags as $tag)
                    <span class="badge badge-pill badge-secondary">{{ $tag->name }}</span>
                @endforeach
            </div>


            <h2 class="comment-num badge badge-pill badge-success">{{ $post->comments->count() }} -- Comments <i class="fas fa-comment"></i></h2>

            <div class="comment">
                @foreach ($post->comments as $comment)
                    <div class="author-info">
                        <img src="https://source.unsplash.com/1600x900/?code,php" class="auther-img">

                        <div class="auther-name">
                            <h4 class="nameUpper">{{ $comment->name }}</h4>
                            <p class="auther-time">{{ date('F nS, Y - g:i' ,strtotime($comment->created_at)) }}</p>

                        </div>

                    </div>

                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- <div class="row" style="margin-top:30px;">
        <div class="col-md-8 offset-md-2">
            <hr>
            <div id="comment-form">  
                <form action="{{ route('comments.store' , $post->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name :</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label>Email :</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <label>Comment :</label>
                            <textarea name="comment" class="form-control" rows="6"></textarea>
                            <input type="submit" value="Add Comment" class="btn btn-success btn-block" style="margin-top:10px;">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

@endsection
