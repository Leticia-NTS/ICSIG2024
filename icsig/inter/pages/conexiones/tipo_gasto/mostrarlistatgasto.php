<?php 
    include("../../../conexion.php");

    $idtgasto="2";
        if( isset($_POST['idtgasto']) ){
            $idtgasto=$_POST['idtgasto'];
            }

        $tablatgasto="SELECT * FROM sig.tipo_gasto where id_tipo_gasto='".$idtgasto."';"; 
        $result= mysqli_query($conexion,$tablatgasto);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
                if(!$rows){
                    exit();
                    
                }
                    
?>


    <form id="formeditar" method="POST" name="formeditar">
        <div class="row justify-content-end">                            
        <div class="input-group col-3">
          <input type="text" class="form-control" data-inputmask-inputformat="dd/mm/yyyy" value="<?php echo $rows[0]['fecha_reg_tgasto'] ?>"  readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar-alt"></span>
            </div>
          </div>
        </div>
    </div>
            <div class="col-md-8">
                <label>Ingrese el nombre del tipo de gasto</label>
                <input type="text" name="nombreorig" id="nombreorig" class="form-control"  placeholder="Ingrese ..." value="<?php echo $rows[0]['nombre_tipo_gasto'] ?>">
            </div>
            <div class="col-md-auto">
                <label>Nota</label>
                <textarea class="form-control" rows="3" name="notaorig" id="notaorig" placeholder="Ingrese..."><?php echo $rows[0]['nota_tipo_gasto'] ?></textarea>

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
        <input type="hidden" id="idedittgasto" name="idedittgasto" value="<?php echo $idtgasto ?>">
    </div>
</form> 