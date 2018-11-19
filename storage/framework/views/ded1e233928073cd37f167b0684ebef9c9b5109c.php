<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sillericos</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(asset('bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('bower_components/font-awesome/css/font-awesome.min.css')); ?>"> 
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo e(asset('bower_components/Ionicons/css/ionicons.min.css')); ?>">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/AdminLTE.min.css')); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/skins/_all-skins.min.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('dist/css/jquery.dataTables.min.css')); ?>">

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
<?php /*SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green        
*/ ?>
<body class="hold-transition skin-black sidebar-mini sidebar-collapse">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels //-->
      <span class="logo-mini"><img src="<?php echo e(asset('dist/img/logoSmini.jpg')); ?>" class="img-responsive center-block "></span>
      <!-- logo for regular state and mobile devices // <span class="logo-lg">Sillericos</span>-->
      <img src="<?php echo e(asset('dist/img/logoWeb.jpg')); ?>" class="img-responsive center-block " >
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
              <img src="<?php echo e(asset('dist/img/user.jpg')); ?>" class="user-image" alt="User">
              <span class="hidden-xs"><?php echo e(Auth::user()->name); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo e(asset('dist/img/user.jpg')); ?>" class="img-circle" alt="User">
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?php echo e(url('/logout')); ?>" class="btn btn-default btn-flat">Salir</a>
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
        
        
        <?php if(Auth::user()->type == 'admin'): ?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-university"></i>
            <span>Almacenes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo e(url('almacen/categoria')); ?>"><i class="fa fa-circle-o"></i> Categorias</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Sucursales</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Telas</a></li>
            <li><a href="<?php echo e(url('almacen/producto')); ?>"><i class="fa fa-circle-o text-yellow"></i>Productos</a></li>
          </ul>
        </li>
        <li class="header">Acciones</li>
        <li><a href="<?php echo e(url('almacen/producto')); ?>"><i class="fa fa-list text-yellow"></i> <span>Productos</span></a></li>
        <li><a href="#"><i class="fa fa-shopping-cart text-green"></i> <span>Ventas</span></a></li>
        <li><a href="#"><i class="fa fa fa-bar-chart text-blue"></i> <span>Reportes</span></a></li>
        <li><a href="<?php echo e(url('invitado')); ?>"><i class="fa fa-list text-yellow"></i> <span>Busqueda de Productos </span></a></li>
        <?php else: ?>

        <li><a href="<?php echo e(url('invitado')); ?>"><i class="fa fa-list text-yellow"></i> <span>Productos</span></a></li>
        <?php endif; ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    <section class="content-header">
            <h1>
              Sillericos
              <small>2.0</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol>
    </section>
    <section class="content container-fluid">
                <!--Contenido -->
                <?php echo $__env->yieldContent('contenido'); ?>
    </section>
          
    </div>

  <?php /*<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0.0
    </div>
    <strong>Copyright &copy; 2018-2020 <a href=""></a>.</strong> All rights
    reserved.
  </footer>*/ ?>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo e(asset('bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(asset('bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo e(asset('dist/js/adminlte.min.js')); ?>"></script>
<script src="<?php echo e(asset('dist/js/jquery.dataTables.min.js')); ?>"></script>

<?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html>