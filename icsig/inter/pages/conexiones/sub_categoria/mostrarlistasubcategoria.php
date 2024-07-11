<?php 
    include("../../../conexion.php");

    $idsubcategoria="2";
        if( isset($_POST['idsubcategoria']) ){
            $idsubcategoria=$_POST['idsubcategoria'];
            }

        $tablasubcategoria="SELECT * FROM sig.sub_categoria where id_sub_categoria='".$idsubcategoria."';"; 
        $result= mysqli_query($conexion,$tablasubcategoria);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
                if(!$rows){
                    exit();
                    
                }
                    
?>


    <form id="formeditar" method="POST" name="formeditar">
        <div class="row justify-content-end">                            
        <div class="input-group col-3">
          <input type="text" class="form-control" data-inputmask-inputformat="dd/mm/yyyy" value="<?php echo $rows[0]['fecha_reg_subc'] ?>"  readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar-alt"></span>
            </div>
          </div>
        </div>
    </div>
            <div class="col-md-8">
                <label>Ingrese el nombre de la sub-categoría del producto</label>
                <input type="text" name="nombreorig" id="nombreorig" class="form-control"  placeholder="Ingrese ..." value="<?php echo $rows[0]['nombre_sub_categoria'] ?>">
            </div>         
         <div class="col-md-8">
            <label>Categoría</label>
         <select type="text" name="categoriaorig" id="categoriaorig" class="form-control">

              <?php 

                $tablacategoria="SELECT id_categoria_producto, nombre_categoria, fecha_reg_categoria FROM sig.categoria_producto where estatus_categoria='1';";
                 
                 $resultcategoria= mysqli_query($conexion,$tablacategoria);
                 $rowscategoria=$resultcategoria->fetch_all(MYSQLI_ASSOC);

                foreach($rowscategoria as $rowcategoria){  
                    if ($rows[0]['fk_id_categoria']==$rowcategoria['id_categoria_producto']) {
                        echo "<option value='".$rowcategoria['id_categoria_producto']."' selected>".$rowcategoria['nombre_categoria']."</option>";
                    }else{
                        echo "<option value='".$rowcategoria['id_categoria_producto']."'>".$rowcategoria['nombre_categoria']."</option>";
                    }                

                }
               ?>
                <option></option>
         </select>
        <input type="hidden" id="ideditsubcategoria" name="ideditsubcategoria" value="<?php echo $idsubcategoria ?>">
    </div>
</form> 