@extends('main')

@section('title' , '| All Tags')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h1>All Tags</h1>
            <hr>
            <table class="table table-striped table-dark"><!--table-striped table-dark-->
                <thead class="thead">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td><a href="{{ route('tags.show' ,$tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div><!--end the dev one-->

        <div class="col-md-3">
            <div class="alert alert-secondary">
                <h3>New Tags</h3>
                <form action="{{ route('tags.store') }}" method="POST">
                    @csrf
                    <label for="name">Name :</label>
                    <input type="text" name="name" class="form-control" required maxlength="25">
                    <br>
                    <input type="submit" value="Create New Tags" class="btn btn-success btn-block">
                </form>
            </div>
        </div>
    </div>
@endsection
