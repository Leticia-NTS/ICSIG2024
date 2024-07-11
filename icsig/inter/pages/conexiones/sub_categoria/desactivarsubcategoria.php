<?php 
    include("../../../conexion.php");
var_dump($_POST);
      $iddesactivar=$_POST['ideliminar'];

       $sql="UPDATE sub_categoria SET estatus_subc='0' where id_sub_categoria='".$iddesactivar."'";
        echo mysqli_query($conexion,$sql);

?>