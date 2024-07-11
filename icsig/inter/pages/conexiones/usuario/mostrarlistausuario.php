<?php 
    include("../../../conexion.php");

    $idusuario="2";
        if( isset($_POST['idusuario']) ){
            $idusuario=$_POST['idusuario'];
            }

        $tablausuario="SELECT * FROM sig.usuario where id_usuario='".$idusuario."';"; 
        $result= mysqli_query($conexion,$tablausuario);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
                if(!$rows){
                    exit();
                    
                }
                    
?>


    <form id="formeditar" method="POST" name="formeditar">
        <div class="row justify-content-end">                            
        <div class="input-group col-3">
          <input type="text" class="form-control" data-inputmask-inputformat="dd/mm/yyyy" value="<?php echo $rows[0]['fecha_reg_usuario'] ?>"  readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar-alt"></span>
            </div>
          </div>
        </div>
    </div>
            <div class="row">
                 <div class="col-md-6">
                        <label>Primer nombre del usuario</label>
                        <input type="text" name="nombreorig" id="nombreorig" class="form-control"  placeholder="Ingrese ..." value="<?php echo $rows[0]['nombre_usuario'] ?>">
                </div>
                <div class="col-md-6">
                        <label>Primer apellido del usuario</label>
                        <input type="text" name="apellidoorig" id="apellidoorig" class="form-control"  placeholder="Ingrese ..." value="<?php echo $rows[0]['apellido_usuario'] ?>">
                </div>
             </div>
             <div class="row">
                 <div class="col-md-6">
                        <label>Número telefónico</label>
                        <input type="telefono" name="telefonoorig" id="telefonoorig" class="form-control"  placeholder="xxxx-xxxx" value="<?php echo $rows[0]['telefono_usuario'] ?>">
                </div>
                <div class="col-md-6">
                        <label>Número celular</label>
                        <input type="number" name="celularorig" id="celularorig" class="form-control"  placeholder="xxxx-xxxx" value="<?php echo $rows[0]['celular_usuario'] ?>">
                </div>
             </div>                        
             <div class="col-md-6">
                        <label>Correo electrónico</label>
                        <input type="email" name="correoorig" id="correoorig" class="form-control"  placeholder="IngreseCorreo@Electronico.com" value="<?php echo $rows[0]['correo_usuario'] ?>">
                </div>
        <div class="row">
            <div class="col-md-6">
                        <label>Nick</label>
                        <input type="text" name="nickorig" id="nickorig" class="form-control"  placeholder="Ingrese nick del usuario" value="<?php echo $rows[0]['nick_usuario'] ?>">
            </div> 
             <div class="col-md-6">
                        <label>Contraseña</label>
                        <input type="password" min="4" max="10" name="contrasenaorig" id="contrasenaorig" class="form-control" value="<?php echo $rows[0]['contrasena_usuario'] ?>">
            </div>                    
        </div>    
         <div class="row">
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
            </div> 
             <div class="col-md-6">
                <label>Cargo</label>
                 <select type="text" name="cargoorig" id="cargoorig" class="form-control">
                      <?php 
                        
                        $tablacargo="SELECT id_cargo_usuario, cargo_usuario_nombre, fecha_reg_cargo FROM sig.cargo_usuario where estatus_cargo='1';";
                     
                         $resultcargo= mysqli_query($conexion,$tablacargo);
                         $rowscargo=$resultcargo->fetch_all(MYSQLI_ASSOC);

                        foreach($rowscargo as $rowcargo){  
                            if ($rows[0]['fk_id_cargo']==$cargo['id_cargo_usuario']) {
                                echo "<option value='".$rowcargo['id_cargo_usuario']."' selected>".$rowcargo['cargo_usuario_nombre']."</option>";
                            }else{
                                echo "<option value='".$rowscargo['id_scargo_usuario']."'>".$rowscargo['cargo_usuario_nombre']."</option>";
                            }                

                        }
                       ?>
                        <option></option>
                 </select> 
            <input type="hidden" id="ideditusuario" name="ideditusuario" value="<?php echo $idusuario ?>">
        </div>
     </div>
</form> 