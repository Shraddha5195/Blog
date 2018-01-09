@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading h2">Edit Category</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form action="{{ url('admin/categories/edit/'.$category->id) }}" method="post">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="edit_category">Category </label>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                        </div>
                        
                        <button class="btn btn-primary" type="submit">Edit</button>
                        <a href="{{ url('/admin/categories') }}" class="btn btn-primary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
