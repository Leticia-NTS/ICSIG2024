<?php 
    include("../../../conexion.php");

var_dump($_POST); 
        $ideditsubcategoria=$_POST['ideditsubcategoria'];
        $nombreorig=$_POST['nombreorig'];
        $categoriaorig=$_POST['categoriaorig'];
       

    $sql="UPDATE sub_categoria SET nombre_sub_categoria ='".$nombreorig."',fk_id_categoria ='".$categoriaorig."' where id_sub_categoria='".$ideditsubcategoria."'";
     var_dump($sql);
    
        echo mysqli_query($conexion,$sql);

?>