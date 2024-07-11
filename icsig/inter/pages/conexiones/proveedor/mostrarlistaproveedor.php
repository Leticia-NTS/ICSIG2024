<?php 
    include("../../../conexion.php");

    $idproveedor="2";
        if( isset($_POST['idproveedor']) ){
            $idproveedor=$_POST['idproveedor'];
            }

        $tablaproveedor="SELECT * FROM sig.proveedor where id_proveedor='".$idproveedor."';"; 
        $result= mysqli_query($conexion,$tablaproveedor);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
                if(!$rows){
                    exit();
                    
                }
                    
?>


    <form id="formeditar" method="POST" name="formeditar">
        <div class="row justify-content-end">                            
        <div class="input-group col-3">
          <input type="text" class="form-control" data-inputmask-inputformat="dd/mm/yyyy" value="<?php echo $rows[0]['fecha_reg_proveedor'] ?>"  readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar-alt"></span>
            </div>
          </div>
        </div>
    </div>
            <div class="row">
                 <div class="col-md-6">
                        <label>Nombre del proveedor</label>
                        <input type="text" name="nombreorig" id="nombreorig" class="form-control"  placeholder="Ingrese ..." value="<?php echo $rows[0]['nombre_proveedor'] ?>">
                </div>
            <div class="col-md-6">
                        <label>Numero de rtn</label>
                        <input type="text" max="14" name="rtnorig" id="rtnorig" class="form-control"  placeholder="Mínimo 14 carácteres" value="<?php echo $rows[0]['numero_rtn_proveedor'] ?>">
            </div>
             </div>
             <div class="row">
                <div class="col-md-12">
                        <label>Dirección del proveedor</label>
                        <textarea type="text" rows="3" name="direccionorig" id="direccionorig" class="form-control"  placeholder="Ingrese ..."><?php echo $rows[0]['direccion_proveedor'] ?></textarea>
                </div>
            </div>
             <div class="row">
                 <div class="col-md-6">
                        <label>Número telefónico</label>
                        <input type="telefono" name="telefonoorig" id="telefonoorig" class="form-control"  placeholder="xxxx-xxxx" value="<?php echo $rows[0]['telefono_proveedor'] ?>">
                </div>
                <div class="col-md-6">
                        <label>Número celular</label>
                        <input type="number" name="celularorig" id="celularorig" class="form-control"  placeholder="xxxx-xxxx" value="<?php echo $rows[0]['celular_proveedor'] ?>">
                </div>
             </div>                        
        <div class="row">
            <div class="col-md-6">
                        <label>Correo electrónico</label>
                        <input type="email" name="correoorig" id="correoorig" class="form-control" value="<?php echo $rows[0]['correo_proveedor'] ?>">
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
                                echo "<option value='".$rowsucursal['id_sucursal']."'>".$rowsucursal['nombre_sucursal']."</option>";
                            }                

                        }
                       ?>
                        <option></option>
                 </select>
                <input type="hidden" id="ideditproveedor" name="ideditproveedor" value="<?php echo $idproveedor?>">
            </div>
     </div>
</form> 