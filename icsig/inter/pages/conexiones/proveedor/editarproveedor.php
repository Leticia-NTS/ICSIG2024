<?php 
    include("../../../conexion.php");

var_dump($_POST); 
        $nombreorig=$_POST['nombreorig'];
        $rtnorig=$_POST['rtnorig'];
        $direccionorig=$_POST['direccionorig'];
        $telefonoorig=$_POST['telefonoorig'];
        $celularorig=$_POST['celularorig'];
        $correoorig=$_POST['correoorig'];
        $sucursalorig=$_POST['sucursalorig'];
        $ideditproveedor=$_POST['ideditproveedor'];
       
 $sql="UPDATE proveedor SET nombre_proveedor ='".$nombreorig."',numero_rtn_proveedor ='".$rtnorig."',direccion_proveedor ='".$direccionorig."',telefono_proveedor ='".$telefonoorig."',celular_proveedor ='".$celularorig."',correo_proveedor ='".$correoorig."',fk_id_sucursal ='".$sucursalorig."' where id_proveedor='".$ideditproveedor."'";

     var_dump($sql);
    
        echo mysqli_query($conexion,$sql);

?>

