@extends('main')

@section('title' , '| Create New Post')

@section('stylesheets')
    <link rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/select2.min.css') }}">

@endsection

@section('content')


<br>
    <div class="row">

        <div class="col-md-8 offset-md-2">
            <h1>Create New Post</h1>
            <hr>
                 <form action="{{ route('posts.store') }}" method="post" data-parsley-validate>
                    @csrf
                    <div class="form-group">
                        <label name="title">Title:</label>
                        <input type="text" name="title"  class="form-control" required maxlength="255">
                    </div>

                    <div class="form-group">
                        <label name="slug">Slug:</label>
                        <input type="text" name="slug"  class="form-control" required minlength="5" maxlength="255">
                    </div>

                    <div class="form-group">
                        <label name="category_id">Category:</label>
                        <select name="category_id" class="form-control" required>
                            @foreach ($categories as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label name="tags">Tags:</label>
                        <select name="tags[]" class="form-control" id="tags" multiple="multiple" required>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                     <div class="form-group">
                        <label name="body">Post Body:</label>
                        <textarea name="body"  class="form-control" rows="10" required></textarea>
                    </div>
                      <input type="submit" value="Create Post" class="btn btn-success">
                 </form>
        </div>
    </div>

@endsection

@section('scripts')


    <script src="{{ URL::asset('js/parsley.min.js') }}"></script>
    <script src="{{ URL::asset('js/select2.min.js') }}"></script>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector:'textarea',
            plugins: "link code wordcount image",
            menubar: false,
        });
    </script>

   <script type="text/javascript">
      $("#tags").select2({
    placeholder: "Select Tags"
            });
    </script>

@endsection
