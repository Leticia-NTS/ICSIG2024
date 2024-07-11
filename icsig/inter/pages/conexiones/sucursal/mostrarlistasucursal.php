<?php 
    include("../../../conexion.php");

    $idsucursal="2";
        if( isset($_POST['idsucursal']) ){
            $idsucursal=$_POST['idsucursal'];
            }

        $tablasucursal="SELECT * FROM sig.sucursal where id_sucursal='".$idsucursal."';"; 
        $result= mysqli_query($conexion,$tablasucursal);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
                if(!$rows){
                    exit();
                    
                }
                    
?>


    <form id="formeditar" method="POST" name="formeditar">
        <div class="row justify-content-end">                            
        <div class="input-group col-3">
          <input type="text" class="form-control" data-inputmask-inputformat="dd/mm/yyyy" value="<?php echo $rows[0]['fecha_reg_sucursal'] ?>"  readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar-alt"></span>
            </div>
          </div>
        </div>
    </div>
        <div class="col-md-6">
            <label>Nombre de la sucursal</label>
            <input type="text" name="nombreorig" id="nombreorig" class="form-control"  placeholder="Ingrese ..."  value="<?php echo $rows[0]['nombre_sucursal'] ?>">

        </div>
        <div class="col-md-10">
             <label>Ubicación de la sucursal</label>
            <textarea class="form-control" rows="3" name="ubicacionorig" id="ubicacionorig" placeholder="Ingrese..."><?php echo $rows[0]['ubicacion_sucursal'] ?></textarea>

        </div>
     <div class="row">
         <div class="col-md-4">
                <label>Teléfono</label>
                <input type="number" name="telefonoorig" id="telefonoorig" class="form-control"  placeholder="xxxx-xxxx" value="<?php echo $rows[0]['telefono_sucursal'] ?>">

         </div>
        <div class="col-md-4">
             <label>Celular</label>
             <input type="number" name="celularorig" id="celularorig" class="form-control"  placeholder="xxxx-xxxx" value="<?php echo $rows[0]['celular_sucursal'] ?>">

        </div>
        <div class="col-md-6">
             <label>Correo electrónico</label>
             <input type="email" name="correoorig" id="correoorig" class="form-control"  placeholder="IngreseCorreo@Electronico.com" value="<?php echo $rows[0]['correo_sucursal'] ?>">

        </div>
        <div class="col-md-auto">
            <label>Línea</label>
             <select type="text" name="lineaorig" id="lineaorig" class="form-control">
                 
                  <?php 

                    $tablalinea="SELECT id_linea, nombre_linea, fecha_reg_linea FROM sig.linea where estatus_linea='1';";
                      //var_dump( $tablalinea);
                     $resultlinea= mysqli_query($conexion,$tablalinea);
                     //var_dump( $resultlinea);
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
            <input type="hidden" id="ideditsucursal" name="ideditsucursal" value="<?php echo $idsucursal ?>">
        </div>
     </div>
</form> 