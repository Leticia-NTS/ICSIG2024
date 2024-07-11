<?php 
    include("../../../conexion.php");
var_dump($_POST);
      $iddesactivar=$_POST['ideliminar'];

       $sql="UPDATE linea SET estatus_linea='0' where id_linea='".$iddesactivar."'";
        echo mysqli_query($conexion,$sql);

?>