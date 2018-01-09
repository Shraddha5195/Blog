@extends('layouts.app') 

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        Laravel collective form
       {{--  {!! Form::open(['url' => 'foo/bar', 'method' => 'post']) !!} 
            {!! Form::token() !!} 
            <div class="form-group">
                {!! Form::label('email', 'E-mail Address') !!}
                {!! Form::text('email', '' ,['class' => 'form-control'],['placeholder' => 'example@gmail.com']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::checkbox('name', 'value', true)  !!}
                {!! Form::radio('name', 'value', true) !!}
            <div class="form-group">
                {!! Form::date('name', \Carbon\Carbon::now(),['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                 {!! Form::number('name', '1', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group"></div>
                {!! Form::file('image',['class' => 'form-control-file']) !!}
            </div>
            <div class="form-group">
                {!! Form::select('size', [null ,'L' => 'Large', 'S' => 'Small'],null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::select('animal',[
                        'Cats' => ['leopard' => 'Leopard'],
                        'Dogs' => ['spaniel' => 'Spaniel'],
                    ], null, ['class' => 'form-control']); 
                !!}
            </div>
            <div class="form-group">
                {!! Form::selectRange('number' , 10, 20) !!}
            </div>
            <div class="form-group">
                {!! Form::selectMonth('month') !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Click Me!') !!}
            </div>


            {!! Form::macro('myfield', function(){
                return '<input type="awesome">';
            }) !!}

            {!! Form::component('bsText', 'inc.text', ['name', 'value' => null, 'attributes' => []]); !!}

            {!! Form::bsText('first_naame', 'hello') !!}

            {!! Form::myfield() !!}
        {!! Form::close() !!}
    </div>
</div>
 --}}
 <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox"> Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>

@endsection
