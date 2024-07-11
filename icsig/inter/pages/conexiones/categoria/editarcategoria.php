<?php 
    include("../../../conexion.php");

var_dump($_POST); 
        $ideditcategoria=$_POST['ideditcategoria'];
        $nombreorig=$_POST['nombreorig'];
        $lineaorig=$_POST['lineaorig'];
       

    $sql="UPDATE categoria_producto SET nombre_categoria ='".$nombreorig."',fk_id_linea ='".$lineaorig."' where id_categoria_producto='".$ideditcategoria."'";
     var_dump($sql);
    
        echo mysqli_query($conexion,$sql);

?>