<?php 
    include("../../../conexion.php");

var_dump($_POST); 
        $ideditmarca=$_POST['ideditmarca'];
        $nombreorig=$_POST['nombreorig'];
        $proveedororig=$_POST['proveedororig'];
       

    $sql="UPDATE marca_producto SET nombre_marca ='".$nombreorig."',fk_id_proveedor ='".$proveedororig."' where id_marca='".$ideditmarca."'";
     var_dump($sql);
    
        echo mysqli_query($conexion,$sql);

?>