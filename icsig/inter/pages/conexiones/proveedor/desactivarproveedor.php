<?php 
    include("../../../conexion.php");
var_dump($_POST);
      $iddesactivar=$_POST['ideliminar'];

       $sql="UPDATE proveedor SET estatus_proveedor='0' where id_proveedor='".$iddesactivar."'";
        echo mysqli_query($conexion,$sql);

?>