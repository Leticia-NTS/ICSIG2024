<?php 
    include("../../../conexion.php");

        $nombre=$_POST['nombre'];
        $nota=$_POST['nota'];
        $linea=$_POST['linea'];
        $fecharegtgasto=date("d/m/y");

        $sql="INSERT INTO tipo_gasto (nombre_tipo_gasto,nota_tipo_gasto,fk_id_linea,fecha_reg_tgasto)VALUES ('$nombre','$nota','$linea','$fecharegtgasto')";

        echo mysqli_query($conexion,$sql);

?>