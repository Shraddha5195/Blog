@extends('layouts.app')

@section('content')
<div class="container">
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
                    <ul class="list-group">
                        @foreach($categories as $category)
                            <a href="{{ url('category/'.$category->id) }}"><li class="list-group-item"> {{ $category->name }}</li></a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
