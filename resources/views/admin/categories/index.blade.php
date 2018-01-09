@extends('layouts.app')
 
@section('content')

    <div class="row">
          <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">

                <div class="panel-heading h2">Categories</div>
                <div class="panel-body">
                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ url('admin/categories') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="add_category">Add New Category </label>
                            <input type="text" name="name" class="form-control" placeholder="Add category...">
                        </div>
                        <button id="submitbtn" class="btn btn-primary" type="submit">Add</button>  <hr/>
                    </form>

                    <form action="{{ url('admin/categories/dltall') }}" method="post">
                        {{ csrf_field() }}
                       <div class="col-md-12">
                           
                           <input type="checkbox" onchange="checkAll(this)" name="selected_cat_id[]" >&nbsp;
                           <label>All</label>
                       </div>
                        
                        @foreach($categories as $category)
                            @if($category->id == 0)
                                @break;
                            @endif
                            <div class="col-md-1">
                                <input type="checkbox" name="selected_cat_id[]" value="{{ $category->id }}" >
                            </div>
                            <div class="col-md-7">
                                {{ $category->name }}
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-primary btn-sm" href="{{ url('admin/categories/edit/'.$category->id) }}">Edit</a>
                            </div>
                            <div class="col-md-2">
                                 <a class="btn btn-danger btn-sm" href="{{ url('admin/categories/delete/'.$category->id) }}" >Delete</a><br/><br/>
                            </div>
                     @endforeach
                    <button type="submit" class="btn btn-danger deleteText">Delete Selected</button><br/><br/>
                    </form>
                    <button class="btn btn-default" id="element" data-toggle="confirmation" target="_blank">Confirmation</button>
                    <a class="btn btn-primary btn-delete-item">Delete</a>

                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
