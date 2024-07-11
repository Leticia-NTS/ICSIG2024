<?php 
    include("../../../conexion.php");
    $status=1;
        if( isset($_POST['mostrarid']) ){
            $status=$_POST['mostrarid'];
            }
        $tablasucursal="SELECT id_sucursal, nombre_sucursal, fecha_reg_sucursal FROM sig.sucursal where estatus_sucursal='".$status."';";
        $result= mysqli_query($conexion,$tablasucursal);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
            echo "<thead><tr><th>Seleccione</th><th>Id</th><th>Nombre de la sucursal</th><th>Fecha de creación</th></thead>";
            foreach($rows as $row){
                echo "<tr>";
        var_dump($row);
        echo "<td><input type='checkbox' value='".$row['id_sucursal']."'></td>";
                foreach($row as $roww){
                    echo "<td>{$roww}</td>";
                   
                }
                echo "<tr>";
            }
                      
?>