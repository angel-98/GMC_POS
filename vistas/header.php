 <?php 
if (strlen(session_id())<1) 
  session_start();
require_once "../modelos/Negocio.php";
  $cnegocio = new Negocio();
  $rsptan = $cnegocio->listar();
  $regn=$rsptan->fetch_object();
  if (empty($regn)) {
    $nombrenegocio='Configurar datos de su Empresa';

  }else{
    $nombrenegocio=$regn->nombre;
    $logo=$regn->logo;
  };

  ?>
 <!DOCTYPE html>  
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?php echo $nombrenegocio; ?> | POS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/icono.png"> <!-- Icono -->

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../public/css/ticket.css">

  </head>
  <?php $side='';
 if (empty($_GET['op'])) {
    $side='skin-blue sidebar-mini';
 }else{
    $side='skin-blue sidebar-mini sidebar-collapse';
 }
  ?>
<body class="hold-transition <?php echo $side;?>">

  <!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v3.2'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="escritorio.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">GMC <b>POS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"> GMC | <b>POS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegaci??n</span>
          </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../files/usuarios/<?php echo $_SESSION['imagen']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['nombre'].' '.$_SESSION['cargo']; ?>
                  <small><?php echo $nombrenegocio; ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../files/negocio/<?php echo $logo; ?>" class="img-circle" style="width: 50px; height: 50px;" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nombrenegocio; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MEN?? DE NAVEGACI??N</li>

       <?php 
if ($_SESSION['escritorio']==1) {
      echo ' <li><a href="escritorio.php"><i class="fa  fa-dashboard (alias)"></i> <span>Escritorio</span></a>
            </li>';
}
?>

<?php 
if ($_SESSION['almacen']==1) {
    echo ' <li class="treeview">
            <a href="#">
              <i class="fa fa-laptop"></i> <span>Almacen</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="articulo.php"><i class="fa fa-circle-o"></i> Articulos</a></li>
              <li><a href="categoria.php"><i class="fa fa-circle-o"></i> Categorias</a></li>
            </ul>
          </li>';
}
?>

<?php 
if ($_SESSION['compras']==1) {
    echo ' <li class="treeview">
            <a href="#">
              <i class="fa fa-th"></i> <span>Compras</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="ingreso.php"><i class="fa fa-circle-o"></i> Ingresos</a></li>
              <li><a href="proveedor.php"><i class="fa fa-circle-o"></i> Proveedores</a></li>
            </ul>
          </li>';
}
?>
        
<?php 
if ($_SESSION['ventas']==1) {
    echo '<li class="treeview">
            <a href="#">
              <i class="fa fa-shopping-cart"></i> <span>Ventas</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="crearventa.php?op=new"><i class="fa fa-circle-o"></i> Nuevo</a></li>
              <li><a href="venta.php"><i class="fa fa-circle-o"></i> ventas</a></li>
              <li><a href="cliente.php"><i class="fa fa-circle-o"></i> clientes</a></li>
            </ul>
          </li>';
}
?>

<?php 
if ($_SESSION['acceso']==1) {
    echo '  <li class="treeview">
            <a href="#">
              <i class="fa fa-folder"></i> <span>Acceso</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
              <li><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
            </ul>
          </li>';
}
?>

<?php 
if ($_SESSION['configuracion']==1) {
      echo '  <li class="treeview">
              <a href="#">
                <i class="fa fa-gears"></i> <span>Configuracion</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="comprobantes.php"><i class="fa fa-circle-o"></i> Comprobantes </a></li>
                <li><a href="tipopago.php"><i class="fa fa-circle-o"></i> Tipos de pago </a></li>
              </ul>
            </li>';
}
?>

    <li class="header">Reportes</li>   




              
<?php 
if ($_SESSION['consultav']==1) {
    echo '<li class="treeview">
            <a href="#">
              <i class="fa fa-bar-chart"></i> <span>Consulta Ventas</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="ventasfechacliente.php"><i class="fa fa-circle-o"></i> Consulta Ventas</a></li>

            </ul>
          </li>';
}
?>

        <li><a href="ayuda.php"><i class="fa fa-question-circle"></i> <span>Ayuda</span><small class="label pull-right bg-yellow">?</small></a></li>

        

        <li><a href="#"><i class="fa  fa-exclamation-circle"></i> <span>Version</span><small class="label pull-right bg-green">1.0.0</small></a></li>   
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside> 