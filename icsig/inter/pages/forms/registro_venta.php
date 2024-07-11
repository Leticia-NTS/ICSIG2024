<?php 
session_start();
$usuario=false;
if (isset($_SESSION['usuario_logeado'])) {
  $usuario=$_SESSION['usuario_logeado'];  

}else{

 header("Location: http://icsig/inter/login.php", true, 301);
        exit();
}
 //if($usuario['tipo_usuario']==3){echo "no tienes acceso"; die();}
?>

<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../inter/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../inter/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
             
  <script src="../js/jquery-3.6.0.min.js"></script>

     <?php 
    include("../menu.php");
    ?>
    
    
</head>
    
 
<body class="hold-transition sidebar-mini">
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row justify-content-md-center">
          <div class="col-md-auto">
            <h1 class="m-0 text-dark"> <!-- Titulo de la pagina --></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                        <!-- Input addon -->
            <div class="card card-navy">
              <div class="card-header">
                <h3 class="card-title">Factura de compra</h3>
              </div>
              <div class="card-body">
                  
             <div class="row justify-content-end">
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                  <label>Fecha:</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
                  <!-- /.input group -->
                </div>
              </div>

              <div class="row justify-content-start">
                <div class="col-sm-8">
              <div class="form-group">
                <label for="inputStatus">Proveedor</label>
                <select class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>On Hold</option>
                  <option>Canceled</option>
                  <option>Success</option>
                </select>
              </div>
                </div>                               
            </div>
                  
              <div class="row justify-content-start">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label>RTN</label>
                    <input type="text" class="form-control" placeholder="Ingrese ...">
                  </div>
                </div>                            
             </div>                  

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-tools">

            </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Cant.</th>
                      <th>Descripción</th>
                      <th>P. Unit.</th>
                      <th>Descuento</th>
                      <th>Valor</th>
                        <th>Remover</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="pt-3-half" contenteditable="true">183</td>
                      <td class="pt-3-half" contenteditable="true">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td class="pt-3-half" contenteditable="true">11-7-2014</td>
                      <td class="pt-3-half" contenteditable="true">20%</td>
                      <td class="pt-3-half" contenteditable="true">123.00</td> <td><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remover</button></span>
                        </td>
                    </tr>
                    <tr>
                      <td class="pt-3-half" contenteditable="true">183</td>
                      <td class="pt-3-half" contenteditable="true">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td class="pt-3-half" contenteditable="true">11-7-2014</td>
                      <td class="pt-3-half" contenteditable="true">20%</td>
                      <td class="pt-3-half" contenteditable="true">123.00</td> <td><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remover</button></span>
                        </td>
                    </tr>
                    <tr>
                      <td class="pt-3-half" contenteditable="true">183</td>
                      <td class="pt-3-half" contenteditable="true">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td class="pt-3-half" contenteditable="true">11-7-2014</td>
                      <td class="pt-3-half" contenteditable="true">20%</td>
                      <td class="pt-3-half" contenteditable="true">123.00</td> <td><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remover</button></span>
                        </td>
                    </tr>
                    <tr>
                      <td class="pt-3-half" contenteditable="true">183</td>
                      <td class="pt-3-half" contenteditable="true">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td class="pt-3-half" contenteditable="true">11-7-2014</td>
                      <td class="pt-3-half" contenteditable="true">20%</td>
                      <td class="pt-3-half" contenteditable="true">123.00</td> <td><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remover</button></span>
                        </td>
                    </tr>
                    <tr>
                      <td class="pt-3-half" contenteditable="true">183</td>
                      <td class="pt-3-half" contenteditable="true">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td class="pt-3-half" contenteditable="true">11-7-2014</td>
                      <td class="pt-3-half" contenteditable="true">20%</td>
                      <td class="pt-3-half" contenteditable="true">123.00</td> <td><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remover</button></span>
                        </td>
                    </tr>
                    <tr>
                      <td class="pt-3-half" contenteditable="true">183</td>
                      <td class="pt-3-half" contenteditable="true">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td class="pt-3-half" contenteditable="true">11-7-2014</td>
                      <td class="pt-3-half" contenteditable="true">20%</td>
                      <td class="pt-3-half" contenteditable="true">123.00</td> <td><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remover</button></span>
                        </td>
                    </tr>
                    <tr>
                      <td class="pt-3-half" contenteditable="true">183</td>
                      <td class="pt-3-half" contenteditable="true">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td class="pt-3-half" contenteditable="true">11-7-2014</td>
                      <td class="pt-3-half" contenteditable="true">20%</td>
                      <td class="pt-3-half" contenteditable="true">123.00</td> <td><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remover</button></span>
                        </td>
                    </tr>
                    <tr>
                      <td class="pt-3-half" contenteditable="true">183</td>
                      <td class="pt-3-half" contenteditable="true">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td class="pt-3-half" contenteditable="true">11-7-2014</td>
                      <td class="pt-3-half" contenteditable="true">20%</td>
                      <td class="pt-3-half" contenteditable="true">123.00</td> <td><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remover</button></span>
                        </td>
                    </tr>
                    <tr>
                      <td class="pt-3-half" contenteditable="true">183</td>
                      <td class="pt-3-half" contenteditable="true">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td class="pt-3-half" contenteditable="true">11-7-2014</td>
                      <td class="pt-3-half" contenteditable="true">20%</td>
                      <td class="pt-3-half" contenteditable="true">123.00</td> <td><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remover</button></span>
                        </td>
                    </tr>
                    <tr>
                      <td class="pt-3-half" contenteditable="true">183</td>
                      <td class="pt-3-half" contenteditable="true">Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td class="pt-3-half" contenteditable="true">11-7-2014</td>
                      <td class="pt-3-half" contenteditable="true">20%</td>
                      <td class="pt-3-half" contenteditable="true">123.00</td> <td><span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remover</button></span>
                        </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

              <div class="row justify-content-end">
                <div class="col-sm-2">
                  <div class="form-group">
                    <label>Total</label> 
                      <input type="text" class="form-control" placeholder="Ingrese ...">
                  </div>
                </div>                               
            </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
     </div>
    </div>
    <!-- /.content -->
  </div>
    

</div>  <!-- /.content-wrapper -->


<!-- jQuery -->
<script src="../inter/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../inter/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../inter/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../inter/dist/js/adminlte.min.js"></script>
<!-- date-range-picker -->
<script src="../inter/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Select2 -->
<script src="../inter/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../inter/plugins/moment/moment.min.js"></script>
<script src="../inter/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    
    
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<script>
  $(function () {

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })



  })
</script>

</body>
</html>
