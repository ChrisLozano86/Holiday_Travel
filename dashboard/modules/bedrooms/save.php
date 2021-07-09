<?php
include_once '../../class/Habitacion.php';
include_once '../../assets/template/header.php';
$idHabitacion = (isset($_REQUEST['idHabitacion'])) ? $_REQUEST['idHabitacion'] : null;
$idReserva= (isset($_REQUEST['idReserva'])) ? $_REQUEST['idReserva'] : null;
    
    if($idHabitacion){        
        $habitacion = Habitacion::buscarPorId($idHabitacion);        
    }else{
        $habitacion = new Habitacion();
    }

    //Request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $habitacion->setIdReserva($_POST['idReserva']);
        $habitacion->setTipoHabitacion($_POST['tipo_habitacion']);
        $habitacion->setSuplemento($_POST['suplemento']);
        $habitacion->setPlanAlimento($_POST['plan_alimento']);

       
      if($habitacion->guardar()){
            header('Location: index.php?status_code=1');
        }
        
    }
?>

<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
          <a href="index.php?idReserva=<?php echo $idReserva; ?>" class="btn btn-info">Regresar</a><br>

          <div  style="width:80%; margin-left:10%; background-color: white; padding:20px; border-radius:10px;">
            <h4 class="text-center">Registrar Habitación</h4> <br>
            <form action="save.php" method="post">

            <div class="form-group">
            <input class="form-control" type="hidden" name="idReserva" id="idReserva" value="<?php echo $idReserva; ?>">
            </div>

            <div class="form-group">
            <label for="nombre">Tipo de habitación</label>
            <select name="tipo_habitacion" id="tipo_habitacion" class="form-control" style="width: 30%;">
      <option value="">Selecciona un tipo de habitación</option>
      <option value="Sencilla">Sencilla</option>
      <option value="Doble">Doble</option>
      <option value="Triple">Triple</option>
      <option value="Cuatruple">Cuatruple</option>
      <option value="Familiar">Familiar</option>
      
      

    </select>
            </div>
          

            <div class="form-group">
            <label for="nombre">Suplemento</label>
            <select name="suplemento" id="suplemento" class="form-control" style="width: 30%;">
      <option value="">Selecciona un suplemento</option>
      <option value="Estándar">Estandar</option>
      <option value="Vista al mar">Vista al mar</option>
      <option value="Vista al jardín">Vista al jardín</option>
      <option value="Vista a la piscina">Vista a la piscina</option>
      <option value="Vista a la montaña">Vista a la montaña</option>
      <option value="Superior">Superior</option>
       
                                                  
    </select>
            </div>

            <div class="form-group">
            <label for="nombre">Plan de alimento</label>
            <select name="plan_alimento" id="plan_alimento" class="form-control" style="width: 30%;">
            <option value="">Selecciona un plan de alimento</option>
            <option value="Sin Alimentos">sin Alimentos(Europeo)</option>
            <option value="Desayuno Americano">Desayuno Americano</option>
            <option value="Desayuno Continental">Desayuno Continental</option>
            <option value="Desayuno Buffete">Desayuno Buffete</option>
            <option value="Bebidas incluidas">Bebidas incluidas</option>
            <option value="Desayuno, comida, cena">Desayuno, comida, cena</option>
            <option value="Todo inluido">Todo incluido</option>
       
                                                  
    </select>
            </div>

            <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Guardar">
            </div>  
           
            </form>
            </div>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
include_once '../../assets/template/footer.php';
?>