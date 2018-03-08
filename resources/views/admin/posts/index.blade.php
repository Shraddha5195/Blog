@extends('layouts.app')

@section('content')

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

                    <a href="{{ url('admin/post/create') }}">Add New Post</a><br/><br/>
                    <form action="{{ url('admin/post/dltall') }}" method="post">
                        {{ csrf_field() }}
                    <table class="table table-bordered table-striped" id="datatable">
                        <thead>
                            <tr>
                                
                                <th>Row num</th>
                                <th><input type="checkbox" onchange="checkAll(this)" name="selected_cat_id[]">&nbsp;All</th> 
                                <th>Id</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Categories</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th> 
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            {{-- @foreach($posts as $post)
                               
                                <tr>
                                    <td> <input type="checkbox" name="selected_cat_id[]" value="{{ $post->id }}" ></td>
                                    <td>{{ $loop->iteration + '5'*($posts->currentPage()-'1')}}</td>
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
                                    <td>
                                        <a class="btn btn-primary btn-xs" href="{{ url('admin/post/edit/' . $post->id) }}">Edit</a>
                                        <a class="btn btn-danger btn-xs" href="{{ url('admin/post/delete/' . $post->id) }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach --}}
                           
                        </tbody>
                    </table>
                        <button type="submit" class="btn btn-danger deleteText">Delete Selected</button>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
{{-- <script>
$(document).ready(function() {
    $('#datatable').DataTable( {
        initComplete: function () {
            this.api().columns([2,4]).every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
</script> --}}

<script>
$(function() {
    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! url('admin/post/datatable') !!}',
        columns: [
            
            
            { data: 'rownum', name: 'rownum',searchable: false },            
            { data: 'check', name: 'check',orderable: false},
            { data: 'id', name: 'id'},
            { data: 'title', name: 'title'},
            { data: 'body', name: 'body'},
            { data: 'category_names', name: 'categories'},
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action',searchable: false , orderable: false},

        ],
        initComplete: function () {
            this.api().columns([2,3,4,6]).every(function () {
                var column = this;
                var input = document.createElement("input");
                $(input).attr( 'style','width: 100%');
                $(input).appendTo($(column.footer()).empty())
                .on('keyup', function () {
                    column.search($(this).val(), false, false, true).draw();
                });
            });
        }
    });
});
</script>

@endsection