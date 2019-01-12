@extends('main')

@section('title' , '| Tag Edit')

@section('content')
    <div class="row">
        <div class="col-md-12">
           <form action="{{ route('tags.update' , $tag->id) }}" method="POST">
                @csrf
                {{ method_field('put') }}
                <label name="name">Name : </label>
                <input type="text" name="name" value="{{ $tag->name }}" class="form-control">
                <input type="submit" value="Save Change" class="alert alert-success" style="margin-top:10px;">
           </form>
        </div>
    </div>

@endsection
