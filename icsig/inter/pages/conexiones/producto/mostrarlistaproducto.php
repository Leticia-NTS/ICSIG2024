<?php 
    include("../../../conexion.php");

    $idproducto="2";
        if( isset($_POST['idproducto']) ){
            $idproducto=$_POST['idproducto'];
            }

        $tablaproducto="SELECT * FROM sig.producto where id_producto='".$idproducto."';"; 
        $result= mysqli_query($conexion,$tablaproducto);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
                if(!$rows){
                    exit();
                    
                }
                    
?>

<form id="formeditar" method="POST" name="formeditar">
    <div class="row justify-content-end">                            
        <div class="input-group col-3">
          <input type="text" class="form-control" data-inputmask-inputformat="dd/mm/yyyy" value="<?php echo $rows[0]['fecha_reg_producto'] ?>"  readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar-alt"></span>
            </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <label>Nombre del producto</label>
            <input type="text" name="nombreorig" id="nombreorig" class="form-control"  placeholder="Ingrese ..." value="<?php echo $rows[0]['nombre_producto'] ?>">
        </div>
        <div class="col-md-4">
            <label>N° de parte de fabrica</label>
            <input type="text" name="nparteorig" id="nparteorig" class="form-control"  placeholder="Ingrese ..." value="<?php echo $rows[0]['numero_parte_fabrica'] ?>">
        </div>
     </div>
     <div class="col-md-10">
            <label>Descripción</label>
            <textarea class="form-control" rows="3" name="descripcionorig" id="descripcionorig" placeholder="Ingrese..." ><?php echo $rows[0]['descripcion_producto'] ?></textarea>
     </div>
     <div class="row">
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
    </div> 
        <div class="col-md-6">
            <label>Marca</label>
         <select type="text" name="marcaorig" id="marcaorig" class="form-control">

              <?php 

                $tablamarca="SELECT id_marca, nombre_marca, fecha_reg_marca FROM sig.marca_producto where estatus_marca='1';";
                 
                 $resultmarca= mysqli_query($conexion,$tablamarca);
                 $rowsmarca=$resultmarca->fetch_all(MYSQLI_ASSOC);

                foreach($rowsmarca as $rowmarca){  
                    if ($rows[0]['fk_id_marca']==$rowmarca['id_marca']) {
                        echo "<option value='".$rowmarca['id_marca']."' selected>".$rowmarca['nombre_marca']."</option>";
                    }else{
                        echo "<option value='".$rowmarca['id_marca']."'>".$rowmarca['nombre_marca']."</option>";
                    }                

                }
               ?>
                <option></option>
         </select>
    </div> 
     </div>
     <div class="row">
         <div class="col-md-6">
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
    </div>
    <div class="col-md-6">
            <label>Sub-categoría</label>
         <select type="text" name="subcategoriaorig" id="subcategoriaorig" class="form-control">

              <?php 

                $tablasubcategoria="SELECT id_sub_categoria, nombre_sub_categoria, fecha_reg_subc FROM sig.sub_categoria where estatus_subc='1';";
                 
                 $resultsubcategoria= mysqli_query($conexion,$tablasubcategoria);
                 $rowssubcategoria=$resultsubcategoria->fetch_all(MYSQLI_ASSOC);

                foreach($rowssubcategoria as $rowsubcategoria){  
                    if ($rows[0]['fk_id_sub_categoria']==$rowsubcategoria['id_sub_categoria']) {
                        echo "<option value='".$rowsubcategoria['id_sub_categoria']."' selected>".$rowsubcategoria['nombre_sub_categoria']."</option>";
                    }else{
                        echo "<option value='".$rowsubcategoria['id_sub_categoria']."'>".$rowsubcategoria['nombre_sub_categoria']."</option>";
                    }                

                }
               ?>
                <option></option>
         </select>
    </div> 
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
        </div> 
     </div>                            
     <div class="row justify-content-center">
        <div class="col-md-2">
            <label>Precio de compra</label>
            <input type="number" name="pcompraorig" id="pcompraorig" class="form-control"  placeholder="Ingrese ..."  value="<?php echo $rows[0]['precio_compra_producto'] ?>">
        </div>
        <div class="col-md-2">
            <label>Precio de venta</label>
            <input type="number" name="pventaorig" id="pventaorig" class="form-control"  placeholder="Ingrese ..." value="<?php echo $rows[0]['precio_venta_producto'] ?>">
        </div>
          <input type="hidden" id="ideditproducto" name="ideditproducto" value="<?php echo $idproducto ?>">
     </div>  
</form>