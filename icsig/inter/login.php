<?php
session_start();

$mensaje = false;
if (isset($_SESSION['usuario_logeado'])) {
  header("Location: http://icsig/inter/pages/inicio.php", true, 301);
  exit();
} else {

  include ("conexion.php");

  if (isset($_POST['usuario']) && isset($_POST['password'])) {


    $comparar = "SELECT * FROM sig.usuario where nick_usuario='" . $_POST['usuario'] . "' and contrasena_usuario ='" . $_POST['password'] . "' and estatus_usuario='1';";

    $result = mysqli_query($conexion, $comparar);
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    if (count($rows) > 0) {
      $_SESSION['usuario_logeado'] = $rows[0];

      header("Location: http://icsig/inter/pages/inicio.php", true, 301);
      exit();
    } else {

      $mensaje = "Usuario o contraseña incorrectos";
    }
  }
}
;
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Isaac Cromos | Iniciar sesión</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../icsig/inter/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../iscsig/inter/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../icsig/inter/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Isaac</b>Cromos</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Ingrese para iniciar sesión</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Usuario" name="usuario">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-check"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../icsig/inter/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../icsig/inter/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../icsig/inter/dist/js/adminlte.min.js"></script>

</body>

</html>