<?php 
    include("../../../conexion.php");
    $status=1;
        if( isset($_POST['mostrarid']) ){
            $status=$_POST['mostrarid'];
            }
        $tablasubcategoria="SELECT id_sub_categoria, nombre_sub_categoria, fecha_reg_subc FROM sig.sub_categoria where estatus_subc='".$status."';";
        $result= mysqli_query($conexion,$tablasubcategoria);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
            echo "<thead><tr><th>Seleccione</th><th>Id</th><th>Nombre de la sub-categoría del producto</th><th>Fecha de creación</th></thead>";
            foreach($rows as $row){
                echo "<tr>";
        var_dump($row);
        echo "<td><input type='checkbox' value='".$row['id_sub_categoria']."'></td>";
                foreach($row as $roww){
                    echo "<td>{$roww}</td>";
                   
                }
                echo "<tr>";
            }
                      
?>