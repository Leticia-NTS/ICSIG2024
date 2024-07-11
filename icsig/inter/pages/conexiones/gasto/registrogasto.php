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
        $usuariot=$usuario['id_usuario'];
        $sucursal=$usuario['fk_id_sucursal'];
        $fecharegcargo=date("d/m/y");
        $totalm=$_POST['totalm'];
        $mitabla=$_POST["tabla"];
        $tablaarray=json_decode(utf8_decode($mitabla));
//var_dump($sucursal);

for($i=0; $i<count($tablaarray); $i++)
      {
     /*	  
      var_dump($tablaarray[$i]->descripcion);
      var_dump($tablaarray[$i]->gasto);
	  var_dump($tablaarray[$i]->tgasto);
    */
    
     $sql="INSERT INTO gasto (fk_id_usuario, fk_id_sucursal, fk_id_tipo_gasto, descripcion_gasto, monto_gasto, total_gasto, fecha_reg_gasto) 
                    VALUES ('".$usuariot."','".$sucursal."','".$tablaarray[$i]->tgasto."','".$tablaarray[$i]->descripcion."','".$tablaarray[$i]->gasto."','".$totalm."','".$fecharegcargo."')";
        echo mysqli_query($conexion,$sql);
    
      }