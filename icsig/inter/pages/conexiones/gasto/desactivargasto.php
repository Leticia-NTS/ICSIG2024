<?php 
    include("../../../conexion.php");
var_dump($_POST);
      $iddesactivar=$_POST['ideliminar'];

       $sql="UPDATE gasto SET estatus_gasto='0' where id_gasto='".$iddesactivar."'";
        echo mysqli_query($conexion,$sql);

?>