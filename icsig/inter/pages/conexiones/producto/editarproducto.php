<?php 
    include("../../../conexion.php");

var_dump($_POST); 
        $ideditproducto=$_POST['ideditproducto'];
        $nombreorig=$_POST['nombreorig'];
        $nparteorig=$_POST['nparteorig'];
        $descripcionorig=$_POST['descripcionorig'];
        $proveedororig=$_POST['proveedororig'];
        $marcaorig=$_POST['marcaorig'];
        $categoriaorig=$_POST['categoriaorig'];
        $subcategoriaorig=$_POST['subcategoriaorig'];
        $sucursalorig=$_POST['sucursalorig'];
        $lineaorig=$_POST['lineaorig'];
        $pcompraorig=$_POST['pcompraorig'];
        $pventaorig=$_POST['pventaorig'];
        
       

    $sql="UPDATE producto SET nombre_producto ='".$nombreorig."',numero_parte_fabrica='".$nparteorig."',descripcion_producto ='".$descripcionorig."',fk_id_proveedor ='".$proveedororig."',fk_id_marca ='".$marcaorig."',fk_id_categoria_producto ='".$categoriaorig."',fk_id_sub_categoria ='".$subcategoriaorig."',fk_id_sucursal ='".$sucursalorig."',fk_id_linea='".$lineaorig."',precio_compra_producto ='".$pcompraorig."',precio_venta_producto ='".$pventaorig."' where id_producto='".$ideditproducto."'";
     var_dump($sql);
    
        echo mysqli_query($conexion,$sql);

?>