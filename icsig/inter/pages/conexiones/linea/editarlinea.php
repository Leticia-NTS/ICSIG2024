<?php 
    include("../../../conexion.php");

var_dump($_POST); 
        $ideditlinea=$_POST['ideditlinea'];
        $nombreorig=$_POST['nombreorig'];
       

    $sql="UPDATE linea SET nombre_linea ='".$nombreorig."' where id_linea='".$ideditlinea."'";
     var_dump($sql);
    
        echo mysqli_query($conexion,$sql);

?>