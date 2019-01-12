@extends('main')

@section('title' , "| $tag->name Tag")


@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $tag->name }} <small class="badge badge-pill badge-dark">{{ $tag->posts->count() }} Post</small></h1>
        </div>
        <div class="col-md- offset-md-1" style="margin-top:20px;">
            <a href="{{ route('tags.edit' , $tag->id) }}" class="btn btn-warning  btn-sm">Edit</a>
        </div>

        <div class="col-md-2 " style="margin-top:20px;">
            <form action="{{ URL::route('tags.destroy', [$tag->id]) }}" method="post">
                @csrf
                {{ method_field('delete') }}

                <input type="submit" value="Delete" class="btn btn-danger btn-sm">

            </form>
        </div>
    </div>
<hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tag->posts as $post)
                    <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>
                            @foreach ($post->tags as $tag)
                                <span class="badge badge-pill badge-secondary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td><a href="{{ route('posts.show' ,$post->id) }}" class="btn btn-light btn-sm">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
