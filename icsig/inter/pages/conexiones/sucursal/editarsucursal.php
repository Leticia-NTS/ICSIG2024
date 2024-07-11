<?php 
    include("../../../conexion.php");

var_dump($_POST); 
        $ideditsucursal=$_POST['ideditsucursal'];
        $nombreorig=$_POST['nombreorig'];
        $ubicacionorig=$_POST['ubicacionorig'];
        $telefonoorig=$_POST['telefonoorig'];
        $celularorig=$_POST['celularorig'];
        $correoorig=$_POST['correoorig'];
        $lineaorig=$_POST['lineaorig'];
       

    $sql="UPDATE sucursal SET nombre_sucursal ='".$nombreorig."',ubicacion_sucursal ='".$ubicacionorig."',telefono_sucursal ='".$telefonoorig."',celular_sucursal ='".$celularorig."',correo_sucursal ='".$correoorig."',fk_id_linea ='".$lineaorig."' where id_sucursal='".$ideditsucursal."'";
     var_dump($sql);
    
        echo mysqli_query($conexion,$sql);

?>