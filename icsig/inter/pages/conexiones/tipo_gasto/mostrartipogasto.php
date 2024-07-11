<?php 
    include("../../../conexion.php");
    $status=1;
        if( isset($_POST['mostrarid']) ){
            $status=$_POST['mostrarid'];
            }
        $tablatgasto="SELECT id_tipo_gasto, nombre_tipo_gasto, fecha_reg_tgasto FROM sig.tipo_gasto where estatus_tgasto='".$status."';";
        $result= mysqli_query($conexion,$tablatgasto);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
            echo "<thead><tr><th>Seleccione</th><th>Id</th><th>Nombre del tipo de gasto</th><th>Fecha de creación</th></thead>";
            foreach($rows as $row){
                echo "<tr>";
        var_dump($row);
        echo "<td><input type='checkbox' value='".$row['id_tipo_gasto']."'></td>";
                foreach($row as $roww){
                    echo "<td>{$roww}</td>";
                   
                }
                echo "<tr>";
            }
                      
?>