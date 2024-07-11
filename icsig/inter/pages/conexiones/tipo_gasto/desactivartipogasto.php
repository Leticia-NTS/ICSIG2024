<?php 
    include("../../../conexion.php");
var_dump($_POST);
      $iddesactivar=$_POST['ideliminar'];

       $sql="UPDATE tipo_gasto SET estatus_tgasto='0' where id_tipo_gasto='".$iddesactivar."'";
        echo mysqli_query($conexion,$sql);

?>