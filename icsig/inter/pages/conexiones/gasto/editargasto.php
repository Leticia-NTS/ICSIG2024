<?php 
   
session_start();
    include("../../../conexion.php");

$usuario=false;
if (isset($_SESSION['usuario_logeado'])) {
  $usuario=$_SESSION['usuario_logeado'];  

}else{

    echo false;
        exit();
}
        $ideditgasto=$_POST['ideditgasto'];
        $descripcionorig=$_POST['descripcion'];
        $montoorig=$_POST['gasto'];
        $tgastoorig=$_POST['tgasto'];
       

    
     $sql="UPDATE gasto SET descripcion_gasto='".$descripcionorig."', monto_gasto='".$montoorig."', fk_id_tipo_gasto='".$tgastoorig."' where id_gasto=".$ideditgasto;

        echo mysqli_query($conexion,$sql);
    


?>