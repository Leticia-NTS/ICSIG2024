<?php 
    include("../../../conexion.php");

        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $telefono=$_POST['telefono'];
        $celular=$_POST['celular'];
        $correo=$_POST['correo'];
        $contrasena=$_POST['contrasena'];
        $sucursal=$_POST['sucursal'];
        $cargo=$_POST['cargo'];
        $fecharegusuario=date("d/m/y");

        $sql="INSERT INTO usuario (nombre_usuario,apellido_usuario,telefono_usuario,celular_usuario,correo_usuario,contrasena_usuario,fk_id_sucursal,fk_id_cargo_usuario,fecha_reg_usuario)VALUES ('$nombre','$apellido','$telefono','$celular','$correo','$contrasena','$sucursal','$cargo','$fecharegusuario')";

        echo mysqli_query($conexion,$sql);

?>