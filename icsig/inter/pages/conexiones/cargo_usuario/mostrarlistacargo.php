<?php 
    include("../../../conexion.php");

    $idcargo="2";
        if( isset($_POST['idcargo']) ){
            $idcargo=$_POST['idcargo'];
            }

        $tablacargos="SELECT * FROM sig.cargo_usuario where id_cargo_usuario='".$idcargo."';"; 
        $result= mysqli_query($conexion,$tablacargos);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
                if(!$rows){
                    exit();
                    
                }
                    
?>

<form id="formeditar" method="POST" name="formeditar"> 
    <div class="row justify-content-end">                            
        <div class="input-group col-3">
          <input type="text" class="form-control" data-inputmask-inputformat="dd/mm/yyyy" value="<?php echo $rows[0]['fecha_reg_cargo'] ?>"  readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar-alt"></span>
            </div>
          </div>
        </div>
    </div>
    <div class="col-md-6">
        <label>Nombre del cargo</label>
        <input type="text" name="nombreorig" id="nombreorig" class="form-control"  placeholder="Ingrese ..." value="<?php echo $rows[0]['cargo_usuario_nombre'] ?>">
    </div>
     <div class="row">
         <div class="col-md-6">
            <label>Línea</label>
             <select type="text" name="lineaorig" id="lineaorig" class="form-control">
                 
                  <?php 

                    $tablalinea="SELECT id_linea, nombre_linea, fecha_reg_linea FROM sig.linea where estatus_linea='1';";
                     
                     $resultlinea= mysqli_query($conexion,$tablalinea);
                     $rowslinea=$resultlinea->fetch_all(MYSQLI_ASSOC);

                    foreach($rowslinea as $rowlinea){  
                    	if ($rows[0]['fk_id_linea']==$rowlinea['id_linea']) {
                    		echo "<option value='".$rowlinea['id_linea']."' selected>".$rowlinea['nombre_linea']."</option>";
                    	}else{
                    		echo "<option value='".$rowlinea['id_linea']."'>".$rowlinea['nombre_linea']."</option>";
                    	}                
           
                    }
                   ?>
                 
                    <option></option>
             </select>
        </div>
        <div class="col-md-6">
            <label>Sucursal</label>
             <select type="text" name="sucursalorig" id="sucursalorig" class="form-control">
                  <?php 
                    
                    $tablasucursal="SELECT id_sucursal, nombre_sucursal, fecha_reg_sucursal FROM sig.sucursal where estatus_sucursal='1';";
                 
                     $resultsucursal= mysqli_query($conexion,$tablasucursal);
                     $rowssucursal=$resultsucursal->fetch_all(MYSQLI_ASSOC);

                    foreach($rowssucursal as $rowsucursal){ 
                     if ($rows[0]['fk_id_sucursal']==$rowsucursal['id_sucursal']) {
                    		echo "<option value='".$rowsucursal['id_sucursal']."' selected>".$rowsucursal['nombre_sucursal']."</option>";
                    	}else{   
                             echo "<option value='".$row['id_sucursal']."'>".$row['nombre_sucursal']."</option>";
                                }
                    }
                   ?>
                    <option></option>
             </select>
        <input type="hidden" id="ideditcargo" name="ideditcargo" value="<?php echo $idcargo ?>">
        </div> 
     </div>  
</form>