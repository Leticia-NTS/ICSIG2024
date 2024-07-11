<?php 
    include("../../../conexion.php");

        $nombre=$_POST['nombre'];
        $linea=$_POST['linea'];
        $sucursal=$_POST['sucursal'];
        $fecharegcargo=date("d/m/y");

        $sql="INSERT INTO cargo_usuario (cargo_usuario_nombre,fk_id_linea,fk_id_sucursal,fecha_reg_cargo) 
                    VALUES ('$nombre','$linea','$sucursal','$fecharegcargo')";
        echo mysqli_query($conexion,$sql);

?>