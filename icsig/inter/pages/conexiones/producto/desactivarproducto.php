<?php 
    include("../../../conexion.php");
var_dump($_POST);
      $iddesactivar=$_POST['ideliminar'];

       $sql="UPDATE producto SET estatus_producto='0' where id_producto='".$iddesactivar."'";
        echo mysqli_query($conexion,$sql);

?>