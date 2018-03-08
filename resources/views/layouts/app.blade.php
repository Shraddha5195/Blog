<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ url('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('css/select2.min.css') }}" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> 

    
    @yield('header')
   
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">

                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <a class="navbar-brand" href="{{ url('/admin/timeline') }}">
                        Home
                    </a>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ url('/categories') }}">Categories</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a href="{{ url('admin/posts') }}">Posts</a></li>
                            <li><a href="{{ url('/categories') }}">Categories</a></li>
                            <li><a href="{{ url('admin/categories') }}">Category List</a></li>
                            
                            
        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img src="{{ url('/uploads/avatars/'. Auth::user()->avatar)}}" style="width:32px; height:32px; top:10px; left:10px; border-radius:50%">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                                
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>                                            

                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                       </form>
                                    </li>
                                    <li><a href="{{ url('admin/profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                                    <li>
                                        <a href="{{ url('admin/changepass') }}">Change Password</a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @include("inc.messages")
        </div>
        @yield('content')
    </div>
    <!-- Scripts -->
    
    <script src="{{ url('js/jquery.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('js/ajaxscript.js')}}"></script>
    <script src="{{ url('js/select2.js') }}"></script>
 
    <script src="{{ url('http://localhost/blog/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>



    {{-- START SCRIPT FOR DATATABLE     --}}
    <script type="text/javascript" src="{{ url('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/dataTables.bootstrap4.min.js') }}"></script>
    {{-- END SCRIPT FOR DATATABLE --}}
    <script>
        $(document).ready(function() { $("#cat_list").select2({
            placeholder: "Select Categories"
        }); 
    });
    </script>
    

    {{-- START CONFIRM DIALOGUE FOR DELETE ALL --}}
    <script>
            $(document).ready(function(){
              $(".deleteText").click(function(){
                if (!confirm("Do you want to delete ?")){
                  return false;
                }
              });
            });
    </script>
    {{-- END CONFIRM DIALOGUE FOR DELETE ALL --}}

    {{-- START SCRIPT TO CHECK ALL --}}
    <script>
        function checkAll(ele)
         {
            var checkboxes = document.getElementsByTagName('input');
                if (ele.checked) {
                    for (var i = 0; i < checkboxes.length; i++)
                     {
                        if (checkboxes[i].type == 'checkbox')
                         {
                            checkboxes[i].checked = true;
                        }
                    }
                }
                else
                 {
                     for (var i = 0; i < checkboxes.length; i++)
                      {
                         console.log(i)
                         if (checkboxes[i].type == 'checkbox')
                          {
                             checkboxes[i].checked = false;
                           }
                       }
                   }
               }

    </script>
    {{-- END SCRIPT TO CHECK ALL --}}

    @yield('javascript')
 
</body> 
</html>
