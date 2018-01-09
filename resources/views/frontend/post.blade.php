@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="javascript:history.go(-1)" class="btn btn-primary">Back</a>
                    {{-- <a href="{{ url('/') }}" class="btn btn-primary">Back</a> --}}
                        <h1>{{ $post->title }}</h1>
                        <img src="{{ url('images/'.$post->imageName) }}", height="300px", width="300px">
                        <p><small>{{ $post->created_at }}</small></p>
                        <p>{!! $post->body !!}</p>
                        <hr>
                        
                        {{-- comment part --}}
                        <form action="" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="comment">
                                    <h4>Comments</h4><hr>
                                    @include('inc.messages')
                                    @guest
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name"placeholder="Enter your name">
                                        <label for="email">E-mail</label>
                                        <input type="text" class="form-control" name="email" placeholder="Enter your email"><br>
                                    @else
                                        hello, {{ Auth::user()->name }}
                                    @endguest

                                    <textarea class="form-control" name="comment" placeholder="Comment here..."></textarea><br>
                                    <button type="submit" class="btn btn-primary" name="add_comment">Add Comment</button>
                                </div>
                            </div>
                        </form>
                        @foreach($comments as $comment)
                        @if($comment->post_id == $post->id)
                        <p><strong>{{ $comment->name }}</strong>
                        {{ $comment->created_at->diffForHumans() }}</p>
                        <p>{{ $comment->comment }}</p>
                        @endif
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection
