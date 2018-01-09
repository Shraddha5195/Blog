@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chage Password</div>
                 
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('admin/changepass') }}">
                        {{ csrf_field() }}
                                <label>Enter Your Password</label>
                                <input class="form-control" type="text" name="old_pass">
                                <label>Enter New Password</label>
                                <input class="form-control" type="text" name="new_pass">
                                <label>Re-enter New Password</label>
                                <input class="form-control" type="text" name="new_pass_confirmation"><br/>
                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
