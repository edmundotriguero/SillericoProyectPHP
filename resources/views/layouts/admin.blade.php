<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sillericos</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Bootstrap select piker -->
  <link rel="stylesheet" href="{{asset('dist/css/bootstrap-select.min.css')}}">

  <!-- Font Awesome  v  4.7-->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}"> 
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">

  <link rel="stylesheet" href="{{asset('dist/css/jquery.dataTables.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
{{--SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green        

para iniciar el menu contraido // sidebar-collapse
--}}
<body class="hold-transition skin-black sidebar-mini ">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="{{url('almacen/producto')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels //-->
      <span class="logo-mini"><img src="{{asset('dist/img/logoSmini.jpg')}}" class="img-responsive center-block "></span>
      <!-- logo for regular state and mobile devices // <span class="logo-lg">Sillericos</span>-->
      <img src="{{asset('dist/img/logoWeb.jpg')}}" class="img-responsive center-block " >
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
 
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('dist/img/user.jpg')}}" class="user-image" alt="User">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('dist/img/user.jpg')}}" class="img-circle" alt="User">
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">PANEL</li>
        
        
        @if (Auth::user()->type == 'admin')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-university"></i>
            <span>Almacenes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('almacen/sucursal')}}"><i class="fa fa-circle-o"></i> Sucursales</a></li>
            <li><a href="{{url('almacen/categoria')}}"><i class="fa fa-circle-o"></i> Categorias</a></li>
            <li><a href="{{url('almacen/lote')}}"><i class="fa fa-circle-o"></i> Lotes</a></li>
            <li><a href="{{url('almacen/color')}}"><i class="fa fa-circle-o"></i> Colores</a></li>
            <li><a href="{{url('almacen/tela')}}"><i class="fa fa-circle-o"></i> Telas</a></li>
            <li><a href="{{url('almacen/talla')}}"><i class="fa fa-circle-o"></i> Tallas</a></li>
            <li><a href="{{url('almacen/movimiento')}}"><i class="fa fa-circle-o text-yellow"></i>Movimientos</a></li>
            <li><a href="{{url('almacen/producto')}}"><i class="fa fa-circle-o text-yellow"></i>Productos</a></li>

          </ul>
        </li>
        <li class="header">Acciones</li>
        <li><a href="{{url('almacen/producto')}}"><i class="fa fa-list text-yellow"></i> <span>Productos</span></a></li>
        <li><a href="{{url('ventas/ventas')}}"><i class="fa fa-shopping-cart text-green"></i> <span>Ventas</span></a></li>
        <li><a href="{{url('reportes/ventas')}}"><i class="fa fa fa-bar-chart text-blue"></i> <span>Reportes</span></a></li>
        <li class="treeview">  
          <a href="#">
              <i class="fa fa-university"></i>
              <span>Estadisticas</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{url('reportes/estadisticas')}}"><i class="fa fa-circle-o"></i> Estadistica General</a></li>
              <li><a href="{{url('reportes/estadisticas/general')}}"><i class="fa fa-circle-o"></i>Estadistica sucursal</a></li>
  
            </ul>
        
        </li>
        
        @else

        <li><a href="{{url('invitado')}}"><i class="fa fa-list text-yellow"></i> <span>Productos</span></a></li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <section class="content-header">
            <!-- <h1>
              Sistema Sillericos
             <small>2.0</small>-->
            </h1>
            <!-- <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol> -->
    </section>
    <section class="content container-fluid">
                <!--Contenido -->
                @yield('contenido')
    </section>
          
    </div>

  {{--<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0.0
    </div>
    <strong>Copyright &copy; 2018-2020 <a href=""></a>.</strong> All rights
    reserved.
  </footer>--}}

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('dist/js/bootstrap-select.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('dist/js/jquery.dataTables.min.js')}}"></script>

@stack('scripts')

</body>
</html>