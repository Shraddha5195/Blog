@extends('layouts.app')
@section('header')
<style type="text/css">
    .cropit-preview {
  /* You can specify preview size in CSS */
  width: 960px;
  height: 540px;
}
table{
  border: hidden;
  padding:10px;
  margin: 10px;
}
table td{
  padding:10px;
  margin: 10px;
}
.c1 input {
  width: 200px;
  height: 40px;
}
label {
  width: 100px;
}
</style>
@endsection
@section('content')
<div class="container">
  <div class="row">
    <form enctype="multipart/form-data" action="{{ url('admin/profile') }}" method="POST">  

      <div class="col-md-10 col-md-offset-2">
        <img id="output" src="{{ url('/uploads/avatars/'. $user->avatar) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
        <h2>{{ $user->name }}'s Profile</h2>
        <table>
          <tr>
            <td><label>Username:</label></td>
            <td class="c1"><input type="text" name="name" value="{{ $user->name }}"><br/></td>
          </tr>
          <tr>
            <td><label>Email:</label></td>
            <td class="c1"><input type="text" name="email" value="{{ $user->email }}"></td>
          </tr>
          <tr>
            <td><label>Password:</label></td>
            <td class="c1"><a href="{{ url('admin/changepass') }}">Change password</a></td>
          </tr> 
          <tr>
            <td><label>Gender:</label></td>
            <td>
              <?php
            if( $user->gender  == 'female') {
              echo '<input type="radio" name="gender" value="male">Male
              <input type="radio" name="gender" value="female" checked ="checked">Female';
            }
            else{
              echo '<input type="radio" name="gender" value="male" checked ="checked">Male
              <input type="radio" name="gender" value="female">Female';
            }
                        
             ?>
            </td>
          </tr>         
        </table>
      </div>      
      <div class="col-md-10 col-md-offset-2">  
        <label>Update Profile Image</label>
        <input type="file" name="avatar" onchange="loadFile(event)">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" class="pull-right btn btn-sm btn-primary">                
      </div>  

    </form>    
  </div>
</div>

@endsection
@section('javascript')
<script type="text/javascript">
    var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
@endsection