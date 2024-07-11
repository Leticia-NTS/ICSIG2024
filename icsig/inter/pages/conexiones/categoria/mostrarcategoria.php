<?php 
    include("../../../conexion.php");
    $status=1;
        if( isset($_POST['mostrarid']) ){
            $status=$_POST['mostrarid'];
            }
        $tablacategoria="SELECT id_categoria_producto, nombre_categoria, fecha_reg_categoria FROM sig.categoria_producto where estatus_categoria='".$status."';";
        $result= mysqli_query($conexion,$tablacategoria);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
            echo "<thead><tr><th>Seleccione</th><th>Id</th><th>Nombre de la categoría del producto</th><th>Fecha de creación</th></thead>";
            foreach($rows as $row){
                echo "<tr>";
        var_dump($row);
        echo "<td><input type='checkbox' value='".$row['id_categoria_producto']."'></td>";
                foreach($row as $roww){
                    echo "<td>{$roww}</td>";
                   
                }
                echo "<tr>";
            }
                      
?>