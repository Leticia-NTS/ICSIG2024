<?php 
    include("../../../conexion.php");
    $status=1;
        if( isset($_POST['mostrarid']) ){
            $status=$_POST['mostrarid'];
            }
        $tablagasto="SELECT id_gasto, fk_id_tipo_gasto, fecha_reg_gasto FROM sig.gasto where estatus_gasto='".$status."';";
        $result= mysqli_query($conexion,$tablagasto);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
            echo "<thead><tr><th>Seleccione</th><th>Id</th><th>Tipo de gasto</th><th>Fecha de creación</th></thead>";
            foreach($rows as $row){
                echo "<tr>";
        
        echo "<td><input type='checkbox' value='".$row['id_gasto']."'></td>";
                foreach($row as $roww){
                    echo "<td>{$roww}</td>";
                   
                }
                echo "<tr>";
            }
                      
?>