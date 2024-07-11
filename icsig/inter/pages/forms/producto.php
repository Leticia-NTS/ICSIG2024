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
            <h1>Sección producto</h1>
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
                    <h1 class="modal-title" id="añadirm">Ingrese el producto</h1>
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
                                <div class="col-md-4">
                                    <label>Nombre del producto</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control"  placeholder="Ingrese ...">
                                </div>
                                <div class="col-md-4">
                                    <label>N° de parte de fabrica</label>
                                    <input type="text" name="nparte" id="nparte" class="form-control"  placeholder="Ingrese ...">
                                </div>
                             </div>
                             <div class="col-md-10">
                                    <label>Descripción</label>
                                    <textarea class="form-control" rows="3" name="descripcion" id="descripcion" placeholder="Ingrese..."></textarea>
                             </div>
                             <div class="row">
                            <div class="col-md-6">
                                <label>Proveedor</label>
                                 <select type="text" name="proveedor" id="proveedor" class="form-control">
                                      <?php 
                                        include_once("../../conexion.php");
                                        $tablaproveedor="SELECT id_proveedor, nombre_proveedor, fecha_reg_proveedor FROM sig.proveedor where estatus_proveedor='1';";
                                         $result= mysqli_query($conexion,$tablaproveedor);
                                         $rows=$result->fetch_all(MYSQLI_ASSOC);

                                        foreach($rows as $row){  
                                         echo "<option value='".$row['id_proveedor']."'>".$row['nombre_proveedor']."</option>";
                                            }
                                       ?>
                                        <option></option>
                                 </select>
                            </div>
                                <div class="col-md-6">
                                <label>Marca</label>
                                 <select type="text" name="marca" id="marca" class="form-control">
                                      <?php 
                                        include_once("../../conexion.php");
                                        $tablamarca="SELECT id_marca, nombre_marca, fecha_reg_marca FROM sig.marca_producto where estatus_marca='1';";
                                         $result= mysqli_query($conexion,$tablamarca);
                                         $rows=$result->fetch_all(MYSQLI_ASSOC);

                                        foreach($rows as $row){  
                                         echo "<option value='".$row['id_marca']."'>".$row['nombre_marca']."</option>";
                                            }
                                       ?>
                                        <option></option>
                                 </select>
                            </div> 
                             </div>
                             <div class="row">
                                 <div class="col-md-6">
                                <label>Categoría</label>
                                 <select type="text" name="categoria" id="categoria" class="form-control">
                                      <?php 
                                        include_once("../../conexion.php");
                                        $tablacategoria="SELECT id_categoria_producto, nombre_categoria, fecha_reg_categoria FROM sig.categoria_producto where estatus_categoria='1';";
                                         $result= mysqli_query($conexion,$tablacategoria);
                                         $rows=$result->fetch_all(MYSQLI_ASSOC);

                                        foreach($rows as $row){  
                                         echo "<option value='".$row['id_categoria_producto']."'>".$row['nombre_categoria']."</option>";
                                            }
                                       ?>
                                        <option></option>
                                 </select>
                            </div>
                            <div class="col-md-6">
                                <label>Sub-categoría</label>
                                 <select type="text" name="subcategoria" id="subcategoria" class="form-control">
                                      <?php 
                                        include_once("../../conexion.php");
                                        $tablasubcategoria="SELECT id_sub_categoria, nombre_sub_categoria, fecha_reg_subc FROM sig.sub_categoria where estatus_subc='1';";
                                         $result= mysqli_query($conexion,$tablasubcategoria);
                                         $rows=$result->fetch_all(MYSQLI_ASSOC);

                                        foreach($rows as $row){  
                                         echo "<option value='".$row['id_sub_categoria']."'>".$row['nombre_sub_categoria']."</option>";
                                            }
                                       ?>
                                        <option></option>
                                 </select>
                            </div> 
                             </div>
                             <div class="row">                                 
                                <div class="col-md-6">
                                    <label>Sucursal</label>
                                     <select type="text" name="sucursal" id="sucursal" class="form-control">
                                          <?php 
                                            include_once("../../conexion.php");
                                            $tablasucursal="SELECT id_sucursal, nombre_sucursal, fecha_reg_sucursal FROM sig.sucursal where estatus_sucursal='1';";
                                             $result= mysqli_query($conexion,$tablasucursal);
                                             $rows=$result->fetch_all(MYSQLI_ASSOC);

                                            foreach($rows as $row){  
                                             echo "<option value='".$row['id_sucursal']."'>".$row['nombre_sucursal']."</option>";
                                                }
                                           ?>
                                            <option></option>
                                     </select>
                                </div>
                                 <div class="col-md-6">
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
                             <div class="row justify-content-center">
                                  <div class="col-md-2" class="form-group">
                                    <label>Precio de compra</label>
                                    <input type="number" name="pcompra" id="pcompra" class="form-control"  placeholder="Ingrese ...">
                                </div>
                                <div class="col-md-2">
                                    <label>Precio de venta</label>
                                    <input type="number" name="pventa" id="pventa" class="form-control"  placeholder="Ingrese ...">
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
                    <h1 class="modal-title">Edite el producto</h1>
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
                <h1 class="modal-title">Desactive el producto</h1>
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
                <table class="table table-head-fixed text-nowrap" id="tablaproducto">  
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
				url:"../../pages/conexiones/producto/registroproducto.php",
				data:datos,
				success:function(){
                    
                }					
			});
            
		});
	});
</script>  
<script>
	$.ajax({
		url: "../../pages/conexiones/producto/mostrarproducto.php",
		type: "POST",
		cache: false,
		success: function(data){
			$('#tablaproducto').html(data); 
		}
	});
</script>   
<script>
	document.getElementById("btneditar").addEventListener("click", mostrarmodal);
function mostrarmodal() {
  var idproducto=document.querySelector("input[type=checkbox]:checked");
    if(idproducto){ 
            $.ajax({
				type:"POST",
				url:"../../pages/conexiones/producto/mostrarlistaproducto.php",
				data:"idproducto="+idproducto.value,
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
				url:"../../pages/conexiones/producto/editarproducto.php",
				data:datos2,
				success:function(){
                    refrescar();
                    $('#editar').modal('hide');
                    $('.modal-backdrop').remove();
                    document.getElementById('nombreorig').value="";
                    document.getElementById('nparteorig').value="";
                    document.getElementById('descripcionorig').value="";
                    document.getElementById('proveedororig').value="";
                    document.getElementById('marcaorig').value="";
                    document.getElementById('categoriaorig').value="";
                    document.getElementById('subcategoriaorig').value="";
                    document.getElementById('sucursalorig').value="";
                    document.getElementById('lineaorig').value="";
                    document.getElementById('pcompraorig').value="";
                    document.getElementById('pventaorig').value="";
                }					
			});
}
    function refrescar(){
        $.ajax({
		url: "../../pages/conexiones/producto/mostrarproducto.php",
		type: "POST",
		cache: false,
		success: function(data){
			$('#tablaproducto').html(data); 
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
				url:"../../pages/conexiones/producto/desactivarproducto.php",
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
                url:"../../pages/conexiones/producto/mostrarproducto.php",
                data:'mostrarid='+mostrardesactiva,
                success: function(data){
            $('#tablaproducto').html(data); 
        }
    });
}    
</script>
   
    
</body>
</html>