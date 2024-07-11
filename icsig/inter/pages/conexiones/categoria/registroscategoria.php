<?php 
    include("../../../conexion.php");

        $nombre=$_POST['nombre'];
        $linea=$_POST['linea'];
        $fecharegcategoria=date("d/m/y");

        $sql="INSERT INTO categoria_producto (nombre_categoria,fk_id_linea,fecha_reg_categoria)VALUES ('$nombre','$linea','$fecharegcategoria')";

        echo mysqli_query($conexion,$sql);

?>