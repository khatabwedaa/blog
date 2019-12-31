@extends('main')

@section('title' , '| Home')



@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
               <h1 class="display-4">Welcome to My Blog!</h1>
               <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
               <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
            </div>
        </div>

        <div class="row">
                <div class="col-md-8">
                    @foreach ($posts as $post)
                        <h3>{{ $post->title }}</h3>
                        <p>{{ substr(strip_tags($post->body) , 0 ,300) }}</p>
                        <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
                        <hr>
                    @endforeach

                </div>

                <div class="col-md-3 col-md-offset-1">
                    <h1>Sidebar</h1>
                </div>
        </div>
    </div>

@endsection
