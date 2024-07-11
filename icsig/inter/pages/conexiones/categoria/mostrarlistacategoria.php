<?php 
    include("../../../conexion.php");

    $idcategoria="2";
        if( isset($_POST['idcategoria']) ){
            $idcategoria=$_POST['idcategoria'];
            }

        $tablacategoria="SELECT * FROM sig.categoria_producto where id_categoria_producto='".$idcategoria."';"; 
        $result= mysqli_query($conexion,$tablacategoria);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
                if(!$rows){
                    exit();
                    
                }
                    
?>


    <form id="formeditar" method="POST" name="formeditar">
        <div class="row justify-content-end">                            
        <div class="input-group col-3">
          <input type="text" class="form-control" data-inputmask-inputformat="dd/mm/yyyy" value="<?php echo $rows[0]['fecha_reg_categoria'] ?>"  readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar-alt"></span>
            </div>
          </div>
        </div>
    </div>
            <div class="col-md-8">
                <label>Ingrese el nombre de la categoría del producto</label>
                <input type="text" name="nombreorig" id="nombreorig" class="form-control"  placeholder="Ingrese ..." value="<?php echo $rows[0]['nombre_categoria'] ?>">
            </div>         
         <div class="col-md-8">
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
        <input type="hidden" id="ideditcategoria" name="ideditcategoria" value="<?php echo $idcategoria ?>">
    </div>
</form> 