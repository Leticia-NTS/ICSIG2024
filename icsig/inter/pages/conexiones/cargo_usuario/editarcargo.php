<?php 
    include("../../../conexion.php");

var_dump($_POST); 
        $ideditcargo=$_POST['ideditcargo'];
        $nombreorig=$_POST['nombreorig'];
        $lineaorig=$_POST['lineaorig'];
        $sucursalorig=$_POST['sucursalorig'];
        
       

    $sql="UPDATE cargo_usuario SET cargo_usuario_nombre ='".$nombreorig."',fk_id_linea='".$lineaorig."',fk_id_sucursal ='".$sucursalorig."' where id_cargo_usuario='".$ideditcargo."'";
     var_dump($sql);
    
        echo mysqli_query($conexion,$sql);

?>