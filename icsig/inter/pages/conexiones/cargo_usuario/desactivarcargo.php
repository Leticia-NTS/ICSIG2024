<?php 
    include("../../../conexion.php");
var_dump($_POST);
      $iddesactivar=$_POST['ideliminar'];

       $sql="UPDATE cargo_usuario SET estatus_cargo='0' where id_cargo_usuario='".$iddesactivar."'";
        echo mysqli_query($conexion,$sql);

?>