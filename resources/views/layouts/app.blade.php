
<?php

     require base_path() . '/app/Libs/DavidHelper.php';
    function NavLink($ruta,$texto,$titulo=null)
    {
        $david = new DavidHelper();
        if($titulo)
        {
             echo $david->NavLink2($ruta,$texto,$titulo);
        }else
        {
         echo $david->NavLink($ruta,$texto);
        }

      //  echo '<h1>hola</h1>';
    }
   // $keyrus = new DavidHelper(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Styles -->
    {{-- <link href={{ asset("/css/app.css") }} rel="stylesheet"> --}}

    <link href={{ asset("bower_components/bootstrap/dist/css/bootstrap.min.css")}} rel="stylesheet">
  


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style type="text/css">
        body { padding-top: 70px; }
    </style>


    <script src={{ asset("bower_components/jquery/dist/jquery.min.js")}}></script>
    <script src={{ asset("bower_components/bootstrap/dist/js/bootstrap.min.js")}}></script>

      @yield('head')
</head>
<body>



    <nav class="navbar navbar-default navbar-fixed-top">

        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    {{-- {{DavidHelper::getInstance()->NavLink("pacientes","pacientes") }}  --}}
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Consultorio Dental  
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                    @if (!Auth::guest())
                    <?php NavLink("home","home","Principal"); ?>
                    {{-- <?DavidHelper::getInstance()->Link("pacientes","pacientes");?> --}}
                    {{-- {{ HTML::nav_link('pacientes', 'pacientes') }} --}}
                    <?php NavLink("pacientes","pacientes"); ?>
                    <?php NavLink("citas","citas"); ?>
                 
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Inciar Sesion</a></li>
                        <li><a href="{{ url('/register') }}">Registrarse</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            
                             <span class="glyphicon glyphicon-user" aria-hidden="true" ></span>    {{ Auth::user()->name }} <span class="caret" ></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                       <span class="glyphicon glyphicon-log-out" aria-hidden="true" ></span>  Cerrar Sesion 
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>



    
        @yield('content')
   

    <!-- Scripts -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
   
    {{-- <script src="{{ asset("/js/app.js")}}"></script> --}}
</body>
</html>
