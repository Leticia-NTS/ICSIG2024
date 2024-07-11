<?php 
    include("../../../conexion.php");

    $idlinea="2";
        if( isset($_POST['idlinea']) ){
            $idlinea=$_POST['idlinea'];
            }

        $tablalinea="SELECT * FROM sig.linea where id_linea='".$idlinea."';"; 
        $result= mysqli_query($conexion,$tablalinea);
        $rows=$result->fetch_all(MYSQLI_ASSOC);
                if(!$rows){
                    exit();
                    
                }
                    
?>
<form id="formeditar" method="POST" name="formeditar">
    <div class="row justify-content-end">                            
        <div class="input-group col-3">
          <input type="text" class="form-control" data-inputmask-inputformat="dd/mm/yyyy" value="<?php echo $rows[0]['fecha_reg_linea'] ?>"  readonly>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar-alt"></span>
            </div>
          </div>
        </div>
    </div> 
    <div class="form-group">
    <label>Nombre de la línea</label>
        <input type="text" id="nombreorig" name="nombreorig" class="form-control" placeholder="Ingrese ..." value="<?php echo $rows[0]['nombre_linea'] ?>">
        
        <input type="hidden" id="ideditlinea" name="ideditlinea" value="<?php echo $idlinea ?>">
    </div>
    
</form>    