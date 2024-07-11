<?php 
    include("../../../conexion.php");

    $idgasto=false;
        if( isset($_POST['idgasto']) ){
            $idgasto=$_POST['idgasto'];
            }
        if ($idgasto) {
          $idsgastos=json_decode( $idgasto);
          $stringids=false;
          $tablagasto=false;
          if (is_array($idsgastos)) {
          $stringids=implode(",", $idsgastos);
          $tablagasto="SELECT * FROM sig.gasto where id_gasto IN (".$stringids.");"; 
          }



        }else{
          echo $idgasto;
          exit();
        }
        if ($tablagasto) {
          $result= mysqli_query($conexion,$tablagasto);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
                if(!$rows){
                    exit();
                    
                }
               
                
        }
      
                    
?>

<form id="formeditar" method="POST" name="formeditar"> 
    
    <div class="row justify-content-end">                            
        <div class="input-group col-3">
          <input type="text" class="form-control" data-inputmask-inputformat="dd/mm/yyyy" value ="<?php echo $rows[0]['fecha_reg_gasto'] ?>"  readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar-alt"></span>
            </div>
          </div>
        </div>
    </div>
<?php for($i = 0; $i < count($rows); $i++){  ?>
    
      <div class="col-12">
        <div class="card">
          <!-- /.card-header -->                                  
          <div class="card-body gastosedit4">                         
            <div class="row">
                <div class="col-md-4">
                    <label>Descripción del gasto</label>
                    <input type="text" name="descripcionorig" id="descripcionorig" class="form-control" value="<?php echo $rows[$i]['descripcion_gasto'] ?>">
                </div>
                <div class="col-md-4">
                    <label>Monto</label>
                    <input type="text" name="montoorig" id="montoorig" class="form-control monto" value="<?php echo $rows[$i]['monto_gasto'] ?>">
                </div>
            <div class="col-md-4">
                <label>Tipo de gasto</label>
             <select type="text" name="tgastoorig" id="tgastoorig" class="form-control">
                  <?php 
                                            
                    $tablatgasto="SELECT id_tipo_gasto, nombre_tipo_gasto, fecha_reg_tgasto FROM sig.tipo_gasto where estatus_tgasto='1';";
                     $resultgasto= mysqli_query($conexion,$tablatgasto);
                     $rowsgasto=$resultgasto->fetch_all(MYSQLI_ASSOC);

                 
                 foreach($rowsgasto as $rowgasto){  
                            if ($rows[$i]['fk_id_tipo_gasto']==$rowgasto['id_tipo_gasto']) {
                                echo "<option value='".$rowgasto['id_tipo_gasto']."' selected>".$rowgasto['nombre_tipo_gasto']."</option>";
                            }else{
                                echo "<option value='".$rowgasto['id_tipo_gasto']."'>".$rowgasto['nombre_tipo_gasto']."</option>";
                            }                

                        }
                   ?>
                    <option></option>
             </select>
            </div>
    
               <input type="hidden" id="ideditgasto" name="ideditgasto" value="<?php echo $rows[$i]["id_gasto"] ?>">   
                
            </div>  
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>       
    
<?php } ?>
         
</form>