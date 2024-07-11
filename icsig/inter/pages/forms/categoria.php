<?php 
session_start();
$usuario=false;
if (isset($_SESSION['usuario_logeado'])) {
  $usuario=$_SESSION['usuario_logeado'];  

}else{

 header("Location: http://icsig/inter/login.php", true, 301);
        exit();
}
 if($usuario['tipo_usuario']==3){echo "no tienes acceso"; die();}
?>

<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">    
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row justify-content-md-center">
          <div class="col-sm-auto">
            <h1>Sección categoría de productos</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="buscar_tabla" class="form-control float-right" placeholder="Buscar">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
                <div class="row">
                      <div class="col-md-6 "> 
                        <button type="button" id="mactiva" class="btn btn-success" onclick="cambiarvista(1)">Activas</button>
                        <button type="button" id="mdesactiva" class="btn btn-danger"  onclick="cambiarvista(0)">Desactivadas</button>
                    </div>
                    <div class="col-md-6 ml-md-auto">   
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#añadir">Añadir</button>
                        <button type="button" id="btneditar" class="btn btn-warning"  >Editar</button>
                        <button type="button" id="btneliminar" class="btn btn-danger" data-toggle="modal" data-target="#desactivar">Desactivar</button>
                    </div>
                </div>
              </div>
                
            <div class="card-body table-responsive p-0">                    
             
              
            <div class="modal fade" id="añadir" tabindex="-1" role="dialog" aria-labelledby="añadirm" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <form id="fajax" method="POST">  
                  <div class="modal-header">
                    <h1 class="modal-title" id="añadirm">Ingrese la categoría del producto</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
              <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                  <div class="card card-outline card-success">
                    <div class="card-body">
                        <div class="row justify-content-end">                            
                        <div class="input-group col-3">
                          <input type="text" class="form-control" data-inputmask-inputformat="dd/mm/yyyy" value ="<?php date_default_timezone_set("America/Tegucigalpa"); echo "" . date("d/m/Y"); ?>"  readonly>
                          <div class="input-group-append">
                            <div class="input-group-text">
                              <span class="fas fa-calendar-alt"></span>
                            </div>
                          </div>
                        </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>Ingrese el nombre de la categoría del producto</label>
                                <input type="text" name="nombre" id="nombre" class="form-control"  placeholder="Ingrese ...">
                            </div>
                             <div class="col-md-8">
                                <label>Línea</label>
                                 <select type="text" name="linea" id="linea" class="form-control">
                                      <?php 
                                        include_once("../../conexion.php");
                                        $tablalinea="SELECT id_linea, nombre_linea, fecha_reg_linea FROM sig.linea where estatus_linea='1';";
                                         $result= mysqli_query($conexion,$tablalinea);
                                         $rows=$result->fetch_all(MYSQLI_ASSOC);

                                        foreach($rows as $row){  
                                         echo "<option value='".$row['id_linea']."'>".$row['nombre_linea']."</option>";
                                            }
                                       ?>
                                        <option></option>
                                 </select>
                            </div>                            
                    </div> 
                    </div><!-- /.card-body -->
                  </div><!-- /.card -->                       
              </div><!-- /.col --> 
             </div><!-- /.row -->
            </div><!-- /.container-fluid -->
                  </div>
                  <div class="modal-footer">
                    <button type="submit" id="btnguardar" class="btn btn-block btn-outline-success">Guardar</button>
                    <button type="button" class="btn btn-block btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
                </form>    
                </div>
              </div>
               
            </div>
            <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editarm" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title">Edite la categoría del producto</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
              <div class="container-fluid">
                <div class="row justify-content-md-center">
                    <div class="col-md-12">
                  <div class="card card-outline card-warning">
                    <div class="card-body">
                        <div class="row justify-content-md-center">
                             <div class="col-md-12">
                                 <div class="form-group" id="mostrarvmodal">
                                      
                                </div>
                            </div>                               
                         </div>
                    </div><!-- /.card-body -->
                  </div><!-- /.card -->                       
              </div><!-- /.col --> 
             </div><!-- /.row -->
            </div><!-- /.container-fluid -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" id="btnguardaredit" class="btn btn-block btn-outline-warning">Guardar</button>
                    <button type="button" class="btn btn-block btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
        <div class="modal fade" id="desactivar" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title">Desactive la categoría del producto</h1>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button> 
              </div>
              <div class="modal-body mx-3">
                  <div class="card card-outline card-danger">
                    <div class="card-body">                  
                  
                <p class="text-center h4">¿Está seguro?</p>
                        </div>
                      </div>

                  
              </div> 
              <div class="modal-footer d-flex justify-content-center deleteButtonsWrapper">
                <button type="button" class="btn btn-block btn-outline-danger btnYesClass" id="btnSi" data-dismiss="modal">Si</button>
                <button type="button" class="btn btn-block btn-outline-secondary btnNoClass" id="btnNo" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>
                <div class="card-body table-responsive p-0" style="height: 400px;">
                <table class="table table-head-fixed text-nowrap" id="tablacategoria">  
                </table>
                </div>
                <tfoot>
                    <!-- espacio para el buscador -->
                </tfoot>
                    
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div> 
     </div><!-- /.container-fluid -->
    </section> 
    <!-- /.content -->
  </div>
    

  <!-- /.content-wrapper -->


<!-- jQuery -->
<script src="/../inter/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>     
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>    
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnguardar').click(function(){
			var datos=$('#fajax').serialize();
			$.ajax({
				type:"POST",
				url:"../../pages/conexiones/categoria/registroscategoria.php",
				data:datos,
				success:function(){
                    
                }					
			});
            
		});
	});
</script>
<script>
	$.ajax({
		url: "../../pages/conexiones/categoria/mostrarcategoria.php",
		type: "POST",
		cache: false,
		success: function(data){
			$('#tablacategoria').html(data); 
		}
	});
</script>    
<script>
	document.getElementById("btneditar").addEventListener("click", mostrarmodal);
function mostrarmodal() {
  var idcategoria=document.querySelector("input[type=checkbox]:checked");
    if(idcategoria){ 
            $.ajax({
				type:"POST",
				url:"../../pages/conexiones/categoria/mostrarlistacategoria.php",
				data:"idcategoria="+idcategoria.value,
				success:function(data){
                   document.getElementById("mostrarvmodal").innerHTML=data;
                    $("#editar").modal("show");
                }					
			});
         }
}
</script>  
<script>
    document.getElementById("btnguardaredit").addEventListener("click", guardarcambio);
 
function guardarcambio() {
  var datos2=$('#formeditar').serialize();
    console.log(datos2)
			$.ajax({
				type:"POST",
				url:"../../pages/conexiones/categoria/editarcategoria.php",
				data:datos2,
				success:function(){
                    refrescar();
                    $('#editar').modal('hide');
                    $('.modal-backdrop').remove();
                    document.getElementById('nombreorig').value="";
                    document.getElementById('lineaorig').value="";
                }					
			});
}
    function refrescar(){
        $.ajax({
		url: "../../pages/conexiones/categoria/mostrarcategoria.php",
		type: "POST",
		cache: false,
		success: function(data){
			$('#tablacategoria').html(data); 
		}
	});
    }
</script>
<script>
    document.getElementById("btnSi").addEventListener("click", eliminar);
 
function eliminar() {
  var eliminard=document.querySelector("input[type=checkbox]:checked");
if(eliminard){
    console.log(eliminard)
			$.ajax({
				type:"POST",
				url:"../../pages/conexiones/categoria/desactivarcategoria.php",
				data:'ideliminar='+eliminard.value,
				success:function(){
                    refrescar();
                    $('#editar').modal('hide');
                    $('.modal-backdrop').remove();
                }					
			});
}
}
</script> 
<script>
function cambiarvista(valor) {
  var mostrardesactiva=valor;
    console.log(mostrardesactiva)
            $.ajax({
                type:"POST",
                url:"../../pages/conexiones/categoria/mostrarcategoria.php",
                data:'mostrarid='+mostrardesactiva,
                success: function(data){
            $('#tablacategoria').html(data); 
        }
    });
}    
</script>     
    
</body>
</html>