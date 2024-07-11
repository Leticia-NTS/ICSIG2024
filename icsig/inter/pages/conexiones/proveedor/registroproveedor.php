<?php 
    include("../../../conexion.php");

        $nombre=$_POST['nombre'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $celular=$_POST['celular'];
        $correo=$_POST['correo'];
        $rtn=$_POST['rtn'];
        $sucursal=$_POST['sucursal'];
        $fecharegproveedor=date("d/m/y");

        $sql="INSERT INTO proveedor (nombre_proveedor,direccion_proveedor,telefono_proveedor,celular_proveedor,correo_proveedor,numero_rtn_proveedor,fk_id_sucursal,fecha_reg_proveedor)VALUES ('$nombre','$direccion','$telefono','$celular','$correo','$rtn','$sucursal','$fecharegproveedor')";

        echo mysqli_query($conexion,$sql);

?>