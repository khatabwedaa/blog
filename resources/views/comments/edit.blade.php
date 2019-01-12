@extends('main')

@section('title' , '| Comment Edit')

@section('content')

    <div class="col-md-8 offset-md-2">
        <h2>Edit Comment</h2>
<br>
        <form action="{{ route('comments.update' , $comment->id) }}" method="post">
            @csrf
            {{ method_field('put') }}
           <div class="form-group">
                <label>Name:</label>
                <input type="name" class="form-control" disabled value="{{ $comment->name }}">
           </div>

           <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" disabled value="{{ $comment->email }}">
           </div>

           <div class="form-group">
                <label>Comment:</label>
                <textarea name="comment" class="form-control" rows="8">{{ $comment->comment }}</textarea>
           </div>

           <input type="submit" value="Save Changes" class="btn btn-success">
        </form>
    </div>
@endsection
