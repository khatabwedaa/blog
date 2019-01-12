@extends('main')

@section('title', '| Edit Post')

@section('stylesheets')
    {{-- <link rel="stylesheet" href="{{ URL::asset('css/parsley.css') }}"> --}}
    <link rel="stylesheet" href="{{ URL::asset('css/select2.min.css') }}">

@endsection

@section('content')

    <h2>Edit Post</h2>

    <form action="{{ URL::route('posts.update', [$post->id]) }}" method="POST" data-parsley-validate enctype="multipart/form-data">
        @csrf
        {{ method_field('put') }}
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label name="title">Title:</label>
                    <input type="text" name="title"  class="form-control" required maxlength="50" value="{{ $post->title }}">
                </div>

                <div class="form-group">
                    <label name="slug">slug:</label>
                    <input type="text" name="slug"  class="form-control" required maxlength="50" value="{{ $post->slug }}">
                </div>

                <div class="form-group">
                    <label name="category_id">Category:</label>
                    <select name="category_id" class="form-control" required>
                            @foreach ($categories as $cate)
                                <option value="{{ $cate->id }}" {{ $cate->id == $post->category_id ? "selected" : "" }}>{{ $cate->name }}</option>
                             @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label name="tags">Tags:</label>
                    <select name="tags[]" class="form-control" id="tags" multiple="multiple">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label name="image">Image:</label>
                    <input type="file" name="image" class="form-control" style="padding-bottom:35px;">
                </div>

                <div class="form-group">
                    <label name="body">Post Body:</label>
                    <textarea name="body" rows="10" class="form-control" required  >{{ $post->body }}</textarea>
                </div>
            </div>

            <div class="col-md-4">
                <div class="alert alert-secondary">
                    <dl class="dl-horizontal">
                        <dt>Create At:</dt>
                        <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                    </dl>

                    <dl class="dl-horizontal" >
                        <dt>Last Update:</dt>
                        <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">

                            <a href="{{ URL::route('posts.show', [$post->id]) }}" class="btn btn-danger btn-block">Cancel</a>
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" value="Save Changes" class="btn btn-success">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')

    {{-- <script src="{{ URL::asset('js/parsley.min.js') }}"></script> --}}
    <script src="{{ URL::asset('js/select2.min.js') }}"></script>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector:"textarea",
            plugins: "link code wordcount image",
            menubar: false,

        });
    </script>

   <script type="text/javascript">
      $("#tags").select2();
      $("#tags").select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
    </script>

@endsection
