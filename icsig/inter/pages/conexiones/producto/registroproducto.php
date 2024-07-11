<?php 
    include("../../../conexion.php");

        $nombre=$_POST['nombre'];
        $nparte=$_POST['nparte'];
        $descripcion=$_POST['descripcion'];
        $proveedor=$_POST['proveedor'];
        $marca=$_POST['marca'];
        $categoria=$_POST['categoria'];
        $subcategoria=$_POST['subcategoria'];
        $sucursal=$_POST['sucursal'];
        $linea=$_POST['linea'];
        $pcompra=$_POST['pcompra'];
        $pventa=$_POST['pventa'];
        $fecharegproducto=date("d/m/y");

        $sql="INSERT INTO producto (nombre_producto,numero_parte_fabrica,descripcion_producto,fk_id_proveedor,fk_id_marca,fk_id_categoria_producto,fk_id_sub_categoria,fk_id_sucursal,fk_id_linea,precio_compra_producto,precio_venta_producto,fecha_reg_producto) 
                    VALUES ('$nombre','$nparte','$descripcion','$proveedor','$marca','$categoria','$subcategoria','$sucursal','$linea','$pcompra','$pventa','$fecharegproducto')";
        echo mysqli_query($conexion,$sql);

?>