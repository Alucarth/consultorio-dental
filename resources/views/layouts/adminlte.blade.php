
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
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Consultorio Dental</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'>
  <!-- Ionicons -->
  <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
  <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
</head>
<body class="hold-transition skin-green layout-top-nav">
<!-- Site wrapper -->
<div class="wrapper">

 <header class="main-header">
    <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b>SC</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Clinica Odontologica</b> Santa Cecilia</span>
    </a>
    <nav class="navbar navbar-static-top">
      
      <div class="container">
        <div class="navbar-header">
          <a href="../../index2.html" class="navbar-brand"> Clinica Odontologica Santa Cecilia</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
           {{--  <li class="active"><a href="#">Pacientes <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Citas</a></li> --}}
             
           
          </ul>
          
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <?php NavLink("home","Inicio"); ?>
              <?php NavLink("pacientes","pacientes"); ?>
              <?php NavLink("citas","citas"); ?>
            <!-- Messages: style can be found in dropdown.less-->
          
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
          
            <!-- Tasks Menu -->
          
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-user" aria-hidden="true" ></span>    {{ Auth::user()->name }} <span class="caret" ></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src='{{asset("imagenes/user.png") }}' class="img-circle" alt="User Image">

                <p>
                   {{ Auth::user()->name." " }}
                <small>{{ Auth::user()->email }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-default" >Salir</button>
                                    </form>
                 
                </div>
              </li>


            </ul>
            <li>
              <a href="{{url('odontologos')}}"> <span class="fa fa-users" aria-hidden="true"> </span> </a>
            </li>
             <li>
              <a href="#"  data-toggle="modal" data-target="#manual"> <span class="fa fa-file-pdf-o"   aria-hidden="true"> </span> </a>
            </li>
      
          </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>

  <!-- =============================================== -->

 
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('titulo')
        <small>@yield('subtitulo')</small>
      </h1>
     {{--  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">

      @yield('content')
    

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2017 <a href="http://almsaeedstudio.com">Spectral Code</a>.</strong> 
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  {{-- <div class="control-sidebar-bg"></div> --}}
</div>
<!-- ./wrapper -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="manual" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Manual de Usuario  </h4>
      </div>
      <div class="modal-body">
      <iframe src={{asset('manual_de_usuario.pdf')}} width="560" height="780" style="border: none;"></iframe>
       {{-- <embed src= {{asset('manual_de_usuario.pdf')}} width= “500” height= “375”> --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<script src="{{ elixir('js/app.js') }}"></script>
@yield("script")
</body>
</html>
