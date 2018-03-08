@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading h2">Posts</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @foreach($posts as $post)
                        <h1><a href="{{ url('post/' . $post->id) }}">{{ $post->title }}</a></h1>
                        <p><small>{{ $post->created_at->format('d-m-Y')}}</small></p>
                        <p>@foreach($post->category() as $category)
                            {{ $category->name }}
                            @if(!$loop->last)
                                ,
                            @endif
                        @endforeach
                        </p>
                        <p>{!! $post->body !!}</p>
                        <hr>
                    @endforeach
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
