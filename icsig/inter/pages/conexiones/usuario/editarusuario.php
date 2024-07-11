<?php 
    include("../../../conexion.php");

var_dump($_POST); 
        $ideditusuario=$_POST['ideditusuario'];
        $nombreorig=$_POST['nombreorig'];
        $apellidoorig=$_POST['apellidoorig'];
        $telefonoorig=$_POST['telefonoorig'];
        $celularorig=$_POST['celularorig'];
        $correoorig=$_POST['correoorig'];
        $nickorig=$_POST['nickorig'];
        $contrasenaorig=$_POST['contrasenaorig'];
        $sucursalorig=$_POST['sucursalorig'];
        $cargoorig=$_POST['cargoorig'];
       

    $sql="UPDATE usuario SET nombre_usuario ='".$nombreorig."',apellido_usuario ='".$apellidoorig."',telefono_usuario ='".$telefonoorig."',celular_usuario ='".$celularorig."',correo_usuario ='".$correoorig."',nick_usuario ='".$nickorig."',contrasena_usuario ='".$contrasenaorig."', fk_id_sucursal ='".$sucursalorig."',fk_id_cargo_usuario ='".$cargoorig."' where id_usuario='".$ideditusuario."'";
     var_dump($sql);
    
        echo mysqli_query($conexion,$sql);

?>