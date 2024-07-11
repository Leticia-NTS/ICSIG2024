<?php 
    include("../../../conexion.php");

        $nombre=$_POST['nombre'];
        $categoria=$_POST['categoria'];
        $fecharegsubcategoria=date("d/m/y");

        $sql="INSERT INTO sub_categoria (nombre_sub_categoria,fk_id_categoria,fecha_reg_subc)VALUES ('$nombre','$categoria','$fecharegsubcategoria')";

        echo mysqli_query($conexion,$sql);

?>