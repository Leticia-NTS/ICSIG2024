<?php 
    include("../../../conexion.php");
    $status=1;
        if( isset($_POST['mostrarid']) ){
            $status=$_POST['mostrarid'];
            }
        $tablamarca="SELECT id_marca, nombre_marca, fecha_reg_marca FROM sig.marca_producto where estatus_marca='".$status."';";
        $result= mysqli_query($conexion,$tablamarca);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
            echo "<thead><tr><th>Seleccione</th><th>Id</th><th>Nombre de la marca</th><th>Fecha de creación</th></thead>";
            foreach($rows as $row){
                echo "<tr>";
        var_dump($row);
        echo "<td><input type='checkbox' value='".$row['id_marca']."'></td>";
                foreach($row as $roww){
                    echo "<td>{$roww}</td>";
                   
                }
                echo "<tr>";
            }
                      
?>