<?php 
session_start();
$usuario=false;
if (isset($_SESSION['usuario_logeado'])) {
  $usuario=$_SESSION['usuario_logeado'];  

}else{

 header("Location: http://icsig/inter/login.php", true, 301);
        exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../inter/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">    
  <!-- iCheck -->
  <link rel="stylesheet" href="../../inter/plugins/icheck-bootstrap/icheck-bootstrap.min.css">  
  <!-- Theme style -->
  <link rel="stylesheet" href="../../inter/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- jQuery -->
    <script src="../../inter/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../../inter/plugins/jquery-ui/jquery-ui.min.js"></script>

                     
     <?php 
    include("menu.php");
    ?> 
</head>
    
 
<body class="hold-transition sidebar-mini">
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row justify-content-center">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Venta</h3>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="../inter/pages/forms/registro_venta.php" class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Compra</h3>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="../inter/pages/forms/registro_compra.php" class="small-box-footer">Ingresar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>


        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<!-- jQuery -->
<script src="../../inter/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../inter/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>    
<!-- Bootstrap 4 -->
<script src="../../inter/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>   
<!-- bs-custom-file-input -->
<script src="../../inter/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../inter/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>    
<!-- AdminLTE App -->
<script src="../../inter/dist/js/adminlte.min.js"></script>
</body>
</html>
