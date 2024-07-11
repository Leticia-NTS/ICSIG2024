<?php 
    include("../../../conexion.php");

    $idmarca="2";
        if( isset($_POST['idmarca']) ){
            $idmarca=$_POST['idmarca'];
            }

        $tablamarca="SELECT * FROM sig.marca_producto where id_marca='".$idmarca."';"; 
        $result= mysqli_query($conexion,$tablamarca);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
                if(!$rows){
                    exit();
                    
                }
                    
?>


    <form id="formeditar" method="POST" name="formeditar">
        <div class="row justify-content-end">                            
        <div class="input-group col-3">
          <input type="text" class="form-control" data-inputmask-inputformat="dd/mm/yyyy" value="<?php echo $rows[0]['fecha_reg_marca'] ?>"  readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar-alt"></span>
            </div>
          </div>
        </div>
    </div>
            <div class="col-md-8">
                <label>Ingrese el nombre de la marca</label>
                <input type="text" name="nombreorig" id="nombreorig" class="form-control"  placeholder="Ingrese ..." value="<?php echo $rows[0]['nombre_marca'] ?>">
            </div>         
         <div class="col-md-6">
            <label>Proveedor</label>
         <select type="text" name="proveedororig" id="proveedororig" class="form-control">

              <?php 

                $tablaproveedor="SELECT id_proveedor, nombre_proveedor, fecha_reg_proveedor FROM sig.proveedor where estatus_proveedor='1';";
                 
                 $resultproveedor= mysqli_query($conexion,$tablaproveedor);
                 $rowsproveedor=$resultproveedor->fetch_all(MYSQLI_ASSOC);

                foreach($rowsproveedor as $rowproveedor){  
                    if ($rows[0]['fk_id_proveedor']==$rowproveedor['id_proveedor']) {
                        echo "<option value='".$rowproveedor['id_proveedor']."' selected>".$rowproveedor['nombre_proveedor']."</option>";
                    }else{
                        echo "<option value='".$rowproveedor['id_proveedor']."'>".$rowproveedor['nombre_proveedor']."</option>";
                    }                

                }
               ?>
                <option></option>
         </select>
        <input type="hidden" id="ideditmarca" name="ideditmarca" value="<?php echo $idmarca ?>">
    </div>
</form> 