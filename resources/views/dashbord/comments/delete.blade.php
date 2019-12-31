@extends('layouts.master')

@section('title' , '| Delete Comment')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>Delete This Comment ?</h3>
            <p>
                <strong>Name: </strong>{{ $comment->name }} <br>
                <strong>Email: </strong>{{ $comment->email }} <br>
                <strong>Comment: </strong>{{ $comment->comment }}
            </p>

            <form action="{{ route('comments.destroy' , $comment->id) }} " method="POST">
                @csrf
                {{ method_field('delete') }}

                <input type="submit" value="Delete Comment" class="btn btn-danger">
            </form>
        </div>
    </div>

@endsection
