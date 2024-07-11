
<!--var_dump($usuario);-->



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Isaac | Cromos</title>
    <!-- Menu tipo Fixed Sidebar -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../inter/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../inter/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../inter/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
    
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../inter/pages/inicio.php" class="nav-link">Inicio</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-th-large"></i></a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Ver perfil</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../../inter/logout.php"><i class="fa fa-user fa-fw"></i>Cerrar sesión</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
    
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../inter/pages/inicio.php" class="brand-link elevation-4">
      <img src="../../inter/dist/img/AdminLTELogo.png"
           alt="#"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Isaac Cromos</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#"  class="d-block">
              <?php echo $usuario['nombre_usuario'].' '.$usuario['apellido_usuario']; ?>
            </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a  class="nav-link">
              <i class="nav-icon fas fa-edit text-olive"></i>
              <p>
                Registro
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../../inter/pages/forms/registro_venta.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registro de venta</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../inter/pages/forms/registro_compra.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registro de compra</p>
                </a>
              </li>
              <?php if($usuario['tipo_usuario']==1 or $usuario['tipo_usuario']==2):?>
              <li class="nav-item">
                <a href="../../inter/pages/forms/gasto.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gastos</p>
                </a>
              </li>
              <?php endif; ?>               
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="../../inter/pages/forms/Informe.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Informe
              </p>
            </a>
          </li>
        <?php if($usuario['tipo_usuario']==1 or $usuario['tipo_usuario']==2):?>
          <li class="nav-item has-treeview">
            <a class="nav-link">
              <i class="nav-icon fas fa-plus-square text-info"></i>
              <p>
                Otros registros
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if($usuario['tipo_usuario']==1 or $usuario['tipo_usuario']==2):?>
              <li class="nav-item">
                <a href="../../inter/pages/forms/proveedor.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proveedor</p>
                </a>
              </li>
              <?php endif; ?>
             <?php if($usuario['tipo_usuario']==1 or $usuario['tipo_usuario']==2):?>
              <li class="nav-item">
                <a href="../../inter/pages/forms/producto.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Producto</p>
                </a>
              </li>
                <?php endif; ?>
                <?php if($usuario['tipo_usuario']==1 or $usuario['tipo_usuario']==2):?>
              <li class="nav-item">
                <a  class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categorías</p>
                  <i class="fas fa-angle-left right"></i>
                </a>
                  <ul class="nav nav-treeview">
                      <?php if($usuario['tipo_usuario']==1 or $usuario['tipo_usuario']==2):?>
                  <li class="nav-item">
                    <a href="../../inter/pages/forms/categoria.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Categoría</p>
                    </a>
                  </li>
                      <?php endif; ?>
                      <?php if($usuario['tipo_usuario']==1 or $usuario['tipo_usuario']==2):?>
                  <li class="nav-item">
                    <a href="../../inter/pages/forms/sub_categoria.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Sub-categoría</p>
                    </a>
                  </li>
                      <?php endif; ?>
                </ul>
              </li>
                <?php endif; ?>
                <?php if($usuario['tipo_usuario']==1 or $usuario['tipo_usuario']==2):?>
              <li class="nav-item">
                <a href="../../inter/pages/forms/marca.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marca</p>
                </a>
              </li>
                <?php endif; ?>
                <?php if($usuario['tipo_usuario']==1 or $usuario['tipo_usuario']==2):?>
              <li class="nav-item">
                <a href="../../inter/pages/forms/tipo_gasto.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tipo de gasto</p>
                </a>
              </li>
                <?php endif; ?>
                <?php if($usuario['tipo_usuario']==1 or $usuario['tipo_usuario']==2):?>
              <li class="nav-item">
                <a  class="nav-link">
                  <i class="far fa-circle nav-icon text-danger"></i>
                  <p>Avanzado</p>
                  <i class="fas fa-angle-left right"></i>
                </a>
                  <ul class="nav nav-treeview">
                    <?php if($usuario['tipo_usuario']==1 or $usuario['tipo_usuario']==2):?>
                  <li class="nav-item">
                    <a href="../../inter/pages/forms/usuario.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-danger"></i>
                      <p>Usuario</p>
                    </a>
                  </li>
                    <?php endif; ?>
                    <?php if($usuario['tipo_usuario']==1 or $usuario['tipo_usuario']==2):?>
                  <li class="nav-item">
                    <a href="../../inter/pages/forms/cargo_usuario.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-danger"></i>
                      <p>Cargo de usuario</p>
                    </a>
                  </li>
                    <?php endif; ?>
                    <?php if($usuario['tipo_usuario']==1 or $usuario['tipo_usuario']==2):?>
                    <li class="nav-item">
                    <a href="../../inter/pages/forms/sucursal.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-danger"></i>
                      <p>Sucursal</p>
                    </a>
                  </li>
                    <?php endif; ?>
                    <?php if($usuario['tipo_usuario']==1 or $usuario['tipo_usuario']==2):?> 
                    <li class="nav-item">
                    <a href="../../inter/pages/forms/linea.php" class="nav-link">
                      <i class="far fa-dot-circle nav-icon text-danger"></i>
                      <p>Línea</p>
                    </a>
                  </li> 
                    <?php endif; ?>
                </ul>
              </li>
                <?php endif; ?>
            </ul>
          </li>
            <?php endif; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
<div class="container-fluid">
    <!-- Area libre  para el contenido de la pagina -->
</div>
<!-- ./wrapper -->
    
<!-- jQuery -->
<script src="../icsig/inter/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../icsig/inter/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../icsig/inter/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../icsig/inter/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../icsig/inter/dist/js/demo.js"></script>
</body>
</html>
