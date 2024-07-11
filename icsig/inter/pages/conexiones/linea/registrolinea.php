<?php 
    include("../../../conexion.php");

        $nombre=$_POST['nombre'];
        $fechareglinea=date("d/m/y");

        $sql="INSERT INTO linea (nombre_linea,fecha_reg_linea) 
                    VALUES ('$nombre','$fechareglinea')";
        echo mysqli_query($conexion,$sql);

?>