<?php 
    include("../../../conexion.php");

var_dump($_POST); 
        $idedittgasto=$_POST['idedittgasto'];
        $nombreorig=$_POST['nombreorig'];
        $notaorig=$_POST['notaorig'];
        $lineaorig=$_POST['lineaorig'];
       

    $sql="UPDATE tipo_gasto SET nombre_tipo_gasto ='".$nombreorig."',nota_tipo_gasto ='".$notaorig."',fk_id_linea ='".$lineaorig."' where id_tipo_gasto='".$idedittgasto."'";
     var_dump($sql);
    
        echo mysqli_query($conexion,$sql);

?>