@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading h2">Edit Post</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }} 
                        </div>
                    @endif

                    <form action="{{ url('admin/post/edit/'.$post->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="post_title">Title </label>
                            <input type="text" class="form-control" name="title" value="{{ $post->title }}" ><br>
                        </div>
                        <div class="form-group">
                            <label for="post_body">Body</label>
                            <textarea id="article-ckeditor" class="form-control" name="body">{{ $post->body }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="post_body">Categories</label>
                            <select id="cat_list" multiple class="form-control" name="categories[]">
                                @foreach($categories as $category)
                                    @if(in_array($category->id, explode(",", $post->categories)))
                                        <option selected="selected" value="{{ $category->id }}">{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <img src="{{ url('images/'.$post->imageName) }}", height="300px", width="300px"><br><br>
                            <input type="file" name="file" id="file">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="javascript:history.go(-1)" class="btn btn-primary">Back</a>
                        {{-- <a href="{{ url('/admin/posts') }}" class="btn btn-primary">Back< /a> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
