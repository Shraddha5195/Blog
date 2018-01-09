@extends('layouts.app')
@section('content')
    <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading h2">MyQuery</div>
                <div class="panel-body">
                    
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                                                                              
                                <th>Id</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Categories</th>
                                <th>Created at</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($posts as $post)
                               
                                <tr id="tblData">
                                    <td >{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{!! str_limit($post->body, 15); !!}</td>
                                    <td>
                                            @foreach($post->category() as $category)
                                                {{ $category->name }}
                                                @if(!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                    </td>
                                    <td>{{ $post->created_at }}</td>
                                   
                                </tr>
                            @endforeach --}}
                            <tr id="tblData">
                                <td >1sdgs</td>
                                <td>fdsghs</td>
                                <td>fgsfg</td>
                                <td>
                                      sfdg
                                </td>
                                <td>dfad</td>
                                   
                            </tr>
                            <tr id="tblData">
                                <td >2fsdgs</td>
                                <td>fdsghs</td>
                                <td>fgsfg</td>
                                <td>
                                      sfdg
                                </td>
                                <td>dfad</td>
                                   
                            </tr>
                            <tr id="tblData">
                                <td >3fsdgs</td>
                                <td>fdsghs</td>
                                <td>fgsfg</td>
                                <td>
                                      sfdg
                                </td>
                                <td>dfad</td>
                                   
                            </tr>
                            <tr id="tblData">
                                <td >4fsdgs</td>
                                <td>fdsghs</td>
                                <td>fgsfg</td>
                                <td>
                                      sfdg
                                </td>
                                <td>dfad</td>
                                   
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')

<script>

$(document).ready(function() {
  $("#tblData").click(function() {
    $(this).fadeOut(500, function() {
      $(this).remove();
    });
  });
});


</script>
@endsection