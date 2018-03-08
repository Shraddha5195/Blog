@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
          
            <div class="panel panel-default">

                <div class="panel-heading h2">Add New Post</div>

                <div class="panel-body">
                   
                    <form action="{{ url('admin/post/create') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="post_title">Title </label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Post Title" value="{{ old('title') }}"> <br>
                        </div>
                        <div class="form-group">
                            <label for="post_body">Body</label>
                            <textarea id="article-ckeditor" class="form-control" name="body" placeholder="Enter Post Body">{{ old('body') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="post_body">Categories</label>
                            <select id="cat_list" class="form-control" multiple name="categories[]">
                                @foreach($categories as $category)
                                
                                <option value="{{ $category->id }}" {{ (collect(old('categories'))->contains($category->id)) ? 'selected':'' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="file" name="file" id="file">
                        </div>
                                                
                       <button type="submit" class="btn btn-primary" name="add_post_btn">Submit</button>
                        <a href="javascript:history.go(-1)" class="btn btn-primary">Back</a>
                        {{-- <a href="{{ url('/admin/posts') }}" class="btn btn-primary">Back< /a> --}}
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
{{-- START SCRIPT FOR CKEDITOR --}}
<script>
    CKEDITOR.replace( 'article-ckeditor' );
</script>
{{-- END SCRIPT FOR CKEDITOR --}}
@endsection