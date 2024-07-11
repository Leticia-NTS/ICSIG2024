<?php 
    include("../../../conexion.php");
var_dump($_POST);
      $iddesactivar=$_POST['ideliminar'];

       $sql="UPDATE categoria_producto SET estatus_categoria='0' where id_categoria_producto='".$iddesactivar."'";
        echo mysqli_query($conexion,$sql);

?>