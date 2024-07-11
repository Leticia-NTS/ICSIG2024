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
            <h1>Sección proveedor</h1>
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
                    <h1 class="modal-title" id="añadirm">Ingrese el proveedor</h1>
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
                             <div class="row">
                                 <div class="col-md-6">
                                        <label>Nombre de proveedor</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control"  placeholder="Ingrese ...">
                                </div>
                             <div class="col-md-6">
                                        <label>Numero de rtn</label>
                                        <input type="text" max="14" name="rtn" id="rtn" class="form-control"  placeholder="Mínimo 14 carácteres">
                            </div>
                             </div>
                             <div class="row">                              
                                <div class="col-md-12">
                                        <label>Dirección del proveedor</label>
                                        <textarea type="text" rows="3" name="direccion" id="direccion" class="form-control"  placeholder="Ingrese ..."></textarea>
                                </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-6">
                                        <label>Número telefónico</label>
                                        <input type="telefono" name="telefono" id="telefono" class="form-control"  placeholder="xxxx-xxxx">
                                </div>
                                <div class="col-md-6">
                                        <label>Número celular</label>
                                        <input type="telefono" name="celular" id="celular" class="form-control"  placeholder="xxxx-xxxx">
                                </div>
                             </div>
                        <div class="row">                                             
                             <div class="col-md-6">
                                        <label>Correo electrónico</label>
                                        <input type="text" name="correo" id="correo" class="form-control"  placeholder="IngreseCorreo@Electronico.com">
                                </div>

                             <div class="col-md-6">
                                <label>Sucursal</label>
                                 <select type="text" name="sucursal" id="sucursal" class="form-control">
                                      <?php 
                                        include_once("../../conexion.php");
                                        $tablasucursal="SELECT id_sucursal, nombre_sucursal, fecha_reg_sucursal FROM sig.sucursal where estatus_sucursal='1';";
                                         $resultsucursal= mysqli_query($conexion,$tablasucursal);
                                         $rows=$resultsucursal->fetch_all(MYSQLI_ASSOC);

                                        foreach($rows as $row){  
                                         echo "<option value='".$row['id_sucursal']."'>".$row['nombre_sucursal']."</option>";
                                            }
                                       ?>
                                        <option></option>
                                 </select>
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
                    <h1 class="modal-title">Edite el proveedor</h1>
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
                <h1 class="modal-title">Desactive el proveedor</h1>
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
                <table class="table table-head-fixed text-nowrap" id="tablaproveedor">  
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
				url:"../../pages/conexiones/proveedor/registroproveedor.php",
				data:datos,
				success:function(){
                    
                }					
			});
            
		});
	});
</script>
<script>
	$.ajax({
		url: "../../pages/conexiones/proveedor/mostrarproveedor.php",
		type: "POST",
		cache: false,
		success: function(data){
			$('#tablaproveedor').html(data); 
		}
	});
</script>    
<script>
	document.getElementById("btneditar").addEventListener("click", mostrarmodal);
function mostrarmodal() {
  var idproveedor=document.querySelector("input[type=checkbox]:checked");
    if(idproveedor){ 
            $.ajax({
				type:"POST",
				url:"../../pages/conexiones/proveedor/mostrarlistaproveedor.php",
				data:"idproveedor="+idproveedor.value,
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
				url:"../../pages/conexiones/proveedor/editarproveedor.php",
				data:datos2,
				success:function(){
                    refrescar();
                    $('#editar').modal('hide');
                    $('.modal-backdrop').remove();
                    document.getElementById('nombreorig').value="";                    
                    document.getElementById('direccionorig').value="";
                    document.getElementById('telefonoorig').value="";
                    document.getElementById('celularorig').value="";                    
                    document.getElementById('correoorig').value="";
                    document.getElementById('rtnorig').value="";
                    document.getElementById('sucursalorig').value="";
                }					
			});
}
    function refrescar(){
        $.ajax({
		url: "../../pages/conexiones/proveedor/mostrarproveedor.php",
		type: "POST",
		cache: false,
		success: function(data){
			$('#tablaproveedor').html(data); 
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
				url:"../../pages/conexiones/proveedor/desactivarproveedor.php",
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
                url:"../../pages/conexiones/proveedor/mostrarproveedor.php",
                data:'mostrarid='+mostrardesactiva,
                success: function(data){
            $('#tablaproveedor').html(data); 
        }
    });
}    
</script>     
    
</body>
</html>