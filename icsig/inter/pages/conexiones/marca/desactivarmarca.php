<?php 
    include("../../../conexion.php");
var_dump($_POST);
      $iddesactivar=$_POST['ideliminar'];

       $sql="UPDATE marca_producto SET estatus_marca='0' where id_marca='".$iddesactivar."'";
        echo mysqli_query($conexion,$sql);

?>