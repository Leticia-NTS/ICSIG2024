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
            <h1>Sección de gasto</h1>
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
                    <?php if($usuario['tipo_usuario']==1 or $usuario['tipo_usuario']==2):?> 
                      <div class="col-md-6 "> 
                        <button type="button" id="mactiva" class="btn btn-success" onclick="cambiarvista(1)">Activas</button>
                        <button type="button" id="mdesactiva" class="btn btn-danger"  onclick="cambiarvista(0)">Desactivadas</button>
                    </div>
                    <?php endif; ?>
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
                     
                  <div class="modal-header">
                    <h1 class="modal-title" id="añadirm">Ingrese el gasto</h1>
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
                     <div class="form-group">
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
                         <div class="col-md-3">
                                <input type="hidden" name="usuario" id="usuario" class="form-control" value="<?php echo $usuario?$usuario['id_usuario']:''?>" >
                        </div>                          
                            <div class="row">
                              <div class="col-12">
                                <div class="card">
                                  <!-- /.card-header -->                                  
                                  <div class="card-body gastoscontent">                         
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Descripción del gasto</label>
                                            <input type="text" name="descripcion" id="descripcion" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Monto</label>
                                            <input type="text" name="monto" id="monto" class="form-control monto">
                                        </div>
                                    <div class="col-md-4">
                                        <label>Tipo de gasto</label>
                                     <select type="text" name="tgasto" id="tgasto" class="form-control">
                                          <?php 
                                            include_once("../../conexion.php");
                                            $tablatgasto="SELECT id_tipo_gasto, nombre_tipo_gasto, fecha_reg_tgasto FROM sig.tipo_gasto where estatus_tgasto='1';";
                                             $result= mysqli_query($conexion,$tablatgasto);
                                             $rows=$result->fetch_all(MYSQLI_ASSOC);

                                            foreach($rows as $row){  
                                             echo "<option value='".$row['id_tipo_gasto']."'>".$row['nombre_tipo_gasto']."</option>";
                                                }
                                           ?>
                                            <option></option>
                                     </select>
                                    </div>
                                    </div>  
                                  </div>
                                  <p><button id="Array_city" class="add_fields btn btn-success">Añadir otro gasto</button></p>
                                  <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                              </div>
                            </div>
                             <div class="col-md-4 ml-md-auto">
                                    <label>Total</label>
                                    <input type="text" name="totalm" id="totalm" class="form-control"  placeholder="00,000.00" readonly>
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
                 
                </div>
              </div>
               
            </div>
            <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="editarm" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title">Edite el cargo de usuario</h1>
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
                <h1 class="modal-title">Desactive el cargo de usuario</h1>
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
                <table class="table table-head-fixed text-nowrap" id="tablagasto">  
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
    
<script src="../../dist/js/bstable.js"></script>
    
<script> 
    
   /* var example2 = new BSTable("tablaingresar", {
			editableColumns:"0,1,2,3",
			$addButton: $('#table2-new-row-button'),
			onEdit:function(row) {
                console.log(row);
                sumam(row);
			}, onAdd:function(row) {
                
            },
			advanced: {
				columnLabel:'Actions',
      buttonHTML: `<div class="btn-group pull-right">
        <button id="bEdit" type="button" class="btn btn-sm btn-default">
          <span class="fa fa-edit" > </span>
        </button>
        <button id="bDel" type="button" class="btn btn-sm btn-default">
          <span class="fa fa-trash" > </span>
        </button>
        <button id="bAcep" type="button" class="btn btn-sm btn-default" style="display:none;">
          <span class="fa fa-check-circle" > </span>
        </button>
        <button id="bCanc" type="button" class="btn btn-sm btn-default" style="display:none;">
          <span class="fa fa-times-circle" > </span>
        </button>
      </div>`

                
			}
		});
		example2.init();*/
  
    
    addeventsuma();
    function sumam(){
        //console.log(row[  0
        //]);
      var total=0;
      console.log(document.querySelectorAll(".monto"));
        var td2 = document.querySelectorAll(".monto");
          for(var i = 0; td2.length > i; i++){
              if(td2[i].value>0){
            console.log(td2 [i].value);
            total +=parseFloat(td2[i].value)
           // console.log(total);
                  }
        }
        //total +=parseFloat(td2[1].innerText)
        document.getElementById("totalm").value=total;
        
    }
    
    function addeventsuma (){
        var classmonto = document.getElementsByClassName("monto");
        for(var i = 0; i < classmonto.length; i++){
            classmonto[i].addEventListener('keyup', sumam, false);
        }
                
    }
</script>    
    
<script>
    // var datosguardar=[];//definimos una variable como global, como un array
    //	document.getElementById("btnlinea").addEventListener("click", agregargastos);
    //function agregargastos(){
        //tomar los datos del form
    //    var userid=document.getElementById("usuario").value;
      //  var descrio=document.getElementById("iddelinput").value;
    //    var monto=document.getElementById("montom").value;
        //con esos datos se genra un array
      //  var temparray={"usuario":userid,"descript":descrio,"monto":monto};
        //generamos la nueva row de la tabla
        //var newrow="<tr><td>"+descrip+"</td><td>"+monto
        //document.getElementById("tablaingresar").innerHTML+=newrow
        //por ultimo guardamos el array en nuestro array global
        //datosguardar[temparray];
        //esto generara un array de arrays que enviaremos a php
    //}


   // function guardargastos(){
      //enviara datosguardar al backend con ajax  
    //}
</script>     

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnguardar').click(function(){            
            var totalm=document.getElementById("totalm");
            var trs=document.querySelectorAll('.gastoscontent .row')
			console.log(trs);
            var datos=[];
            for (var i = 0; i < trs.length; i++) {                
                var temparr={"descripcion":trs[i].querySelector("input[name*='descripcion']").value,"gasto":trs[i].querySelector("input[name*='monto']").value, "tgasto":trs[i].querySelector("select[name*='tgasto']").value};
                datos.push(temparr)
            console.log(datos);             
            }        
            console.log(JSON.stringify(datos))
			$.ajax({
				type:"POST",
				url:"../../pages/conexiones/gasto/registrogasto.php",             data:'tabla='+JSON.stringify(datos)+"&totalm="+totalm.value,
				success:function(){
                     location.reload();
                }					
			});  
            
		});
	});
</script> 
<script>
	$.ajax({
		url: "../../pages/conexiones/gasto/mostrargasto.php",
		type: "POST",
		cache: false,
		success: function(data){
			$('#tablagasto').html(data); 
		}
	});
</script>   
<script>
	document.getElementById("btneditar").addEventListener("click", mostrarmodal);
function mostrarmodal() {
  var idgasto=document.querySelectorAll("input[type=checkbox]:checked");
    console.log(idgasto)
    var checks=[];
    for(var i = 0; i < idgasto.length; i++)
      {
          checks.push(idgasto[i].value);
      }
    
    
    if(idgasto){ 
            $.ajax({
				type:"POST",
				url:"../../pages/conexiones/gasto/mostrarlistagasto.php",
				data:'idgasto='+JSON.stringify(checks),
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
    console.log("uwu ");
            var trs=document.querySelectorAll('.gastosedit4 .row')
			console.log(trs);
          
            for (var i = 0; i < trs.length; i++) {
                  var datos=[]; 
                var temparr={"descripcion":trs[i].querySelector('input[name*="descripcionorig"]').value, 
                "gasto":trs[i].querySelector('input[name*="montoorig"]').value, "tgasto":trs[i].querySelector('select[name*="tgastoorig"]').value,
                "ideditgasto":trs[i].querySelector('input[name*="ideditgasto"]').value};
                datos.push(temparr)
            console.log(datos);             
                 
            console.log(JSON.stringify(datos)) 
			$.ajax({
				type:"POST",
				url:"../../pages/conexiones/gasto/editargasto.php",             data:"descripcion="+trs[i].querySelector('input[name*="descripcionorig"]').value+ 
                "&gasto="+trs[i].querySelector('input[name*="montoorig"]').value+ "&tgasto="+trs[i].querySelector('select[name*="tgastoorig"]').value+
                "&ideditgasto="+trs[i].querySelector('input[name*="ideditgasto"]').value,
				success:function(){
                    location.reload();
                }					
			});
	
    }
 /* var datos2=$('#formeditar').serialize();
    console.log(datos2)
			$.ajax({
				type:"POST",
				url:"../../pages/conexiones/gasto/editargasto.php",
				data:datos2,
				success:function(){
                    refrescar();
                    $('#editar').modal('hide');
                    $('.modal-backdrop').remove();
                }					
			});
            */
}
    function refrescar(){
        $.ajax({
		url: "../../pages/conexiones/gasto/mostrargasto.php",
		type: "POST",
		cache: false,
		success: function(data){
			$('#tablagasto').html(data);
            
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
				url:"../../pages/conexiones/gasto/desactivargasto.php",
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
                url:"../../pages/conexiones/gasto/mostrargasto.php",
                data:'mostrarid='+mostrardesactiva,
                success: function(data){
            $('#tablagasto').html(data);
                    
        }
    });
}    
</script>
<script type="text/javascript">
  

//Add Input Fields
$(document).ready(function() {
    var max_fields = 10; //Maximum allowed input fields 
    var wrapper    = $(".gastoscontent"); //Input fields wrapper
    var add_button = $(".add_fields"); //Add button class or ID
    var x = 1; //Initial input field is set to 1

//- Using an anonymous function:tablaF
//document.getElementById("Array_name").onclick = function () { alert('hello!'); };
  
 //When user click on add input button
 $(add_button).click(function(e){
        e.preventDefault();
 //Check maximum allowed input fields
        if(x < max_fields){ 
            x++; //input field increment
 //add input field
            $(wrapper).append('<div class="row">'+document.querySelector(".gastoscontent .row").innerHTML+' <a href="javascript:void(0);" class="remove_field">Remover</a></div>');
            addeventsuma();
        }
    });
 
    //when user click on remove button
    $(wrapper).on("click",".remove_field", function(e){ 
        e.preventDefault();
 $(this).parent('div').remove(); //remove inout field
 x--; //inout field decrement
    })
});


</script>
    
</body>
</html>