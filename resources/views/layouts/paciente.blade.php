<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Consultorio Dental</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href='{{ asset("bower_components/AdminLTE/bootstrap/css/bootstrap.min.css")}} '>
  <!-- Font Awesome -->
  <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css'>
  <!-- Ionicons -->
  <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>
  <!-- Theme style -->
  <link rel="stylesheet" href='{{asset("bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}'>
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href='{{asset("bower_components/AdminLTE/dist/css/skins/_all-skins.min.css") }}'>


  <script src='{{ asset("bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js")}}'></script>

<!-- Bootstrap 3.3.6 -->
<script src='{{ asset("bower_components/AdminLTE/bootstrap/js/bootstrap.min.js")}}'></script>
<!-- SlimScroll -->
<script src='{{ asset("bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js")}}'></script>
<!-- FastClick -->
<script src='{{ asset("bower_components/AdminLTE/plugins/fastclick/fastclick.js")}}'></script>
<!-- AdminLTE App -->
<script src='{{ asset("bower_components/AdminLTE/dist/js/app.min.js")}}'></script>
<!-- AdminLTE for demo purposes -->
<script src='{{ asset("bower_components/AdminLTE/dist/js/demo.js")}}'></script>



    @yield('head')



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-green sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b> C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Clinica</b> Santa Cecilia</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <li><a href="{{url('pacientes')}}">Pacientes </a></li>
        <li><a href="{{url('citas')}}">Citas</a></li>
        <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> -->

         <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="glyphicon glyphicon-user" aria-hidden="true" ></span>    {{ Auth::user()->name }} <span class="caret" ></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src='{{asset("bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}' class="img-circle" alt="User Image">

                <p>
                   {{ Auth::user()->name  }}
                <small>{{ Auth::user()->email}}</small>
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
                                        <button type="submit" class="btn btn-default" >Cerrar Session</button>
                                    </form>
                 
                </div>
              </li>
            </ul>
          </li>
       


      </ul>
    
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      @yield('menu_paciente')
     
    </section>
    <!-- /.sidebar -->
  </aside>

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
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
 <!-- <script src={{ asset("bower_components/jquery/dist/jquery.min.js")}}></script> -->
<!-- jQuery 2.2.3 -->

</body>
</html>
