<?php 
    include("../../../conexion.php");
var_dump($_POST);
      $iddesactivar=$_POST['ideliminar'];

       $sql="UPDATE sucursal SET estatus_sucursal='0' where id_sucursal='".$iddesactivar."'";
        echo mysqli_query($conexion,$sql);

?>