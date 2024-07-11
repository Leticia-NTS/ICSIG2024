<?php 
    include("../../../conexion.php");

        $nombre=$_POST['nombre'];
        $proveedor=$_POST['proveedor'];
        $fecharegmarca=date("d/m/y");

        $sql="INSERT INTO marca_producto (nombre_marca,fk_id_proveedor,fecha_reg_marca)VALUES ('$nombre','$proveedor','$fecharegmarca')";

        echo mysqli_query($conexion,$sql);

?>