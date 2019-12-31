@extends('layouts.master')

@section('title' , "| $post->slug ")

@section('stylesheets')
    <link rel="stylesheet" href="{{  URL::asset('css/all.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @if ($post->image)
                <img src="{{ asset('images/' . $post->image) }}" class="img-fluid" height="500" width="800" style="border-radius:5px">
                <hr>
            @endif
            <span class="badge badge-pill badge-info">Post --</span> <h3 class="badge badge-pill badge-secondary">{{ $post->title }}</h3>
            <p class="text-style">{!! $post->body !!}</p>
            <hr>
            <div class="tag">
                    <span class="badge badge-pill badge-info">Tags --</span>
                @foreach ($post->tags as $tag)
                    <span class="badge badge-pill badge-secondary">{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>
    </div>
@endsection
