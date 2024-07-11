<?php 
    include("../../../conexion.php");

        $nombre=$_POST['nombre'];
        $ubicacion=$_POST['ubicacion'];
        $telefono=$_POST['telefono'];
        $celular=$_POST['celular'];
        $correo=$_POST['correo'];
        $linea=$_POST['linea'];
        $fecharegsucursal=date("d/m/y");

        $sql="INSERT INTO sucursal (nombre_sucursal,ubicacion_sucursal,telefono_sucursal,celular_sucursal,correo_sucursal,fk_id_linea,fecha_reg_sucursal)VALUES ('$nombre','$ubicacion','$telefono','$celular','$correo','$linea','$fecharegsucursal')";

        echo mysqli_query($conexion,$sql);

?>