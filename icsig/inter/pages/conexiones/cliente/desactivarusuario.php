<?php 
    include("../../../conexion.php");
var_dump($_POST);
      $iddesactivar=$_POST['ideliminar'];

       $sql="UPDATE usuario SET estatus_usuario='0' where id_usuario='".$iddesactivar."'";
        echo mysqli_query($conexion,$sql);

?>