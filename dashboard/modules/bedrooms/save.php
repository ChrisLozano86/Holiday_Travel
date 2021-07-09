<?php
include_once '../../class/Habitacion.php';
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
            header("Location: index.php?idReserva=$idReserva");   
        }
        
    }

      
   
    if (isset($_REQUEST['idHabitacion'])){
      
      $title = 'Editar habitación';
    }else{
      $title = 'Registrar nueva habitación';
    }
    

    include_once '../../assets/template/header.php';
?>

<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">


          <a href="index.php?idReserva=<?php echo $idReserva; ?>" class="btn btn-info">Regresar</a><br>

          <div  style="width:80%; margin-left:10%; background-color: white; padding:20px; border-radius:10px;">
            <h4 class="text-center"><?php echo $title; ?></h4> <br>
            <form action="save.php" method="post">

            <div class="form-group">
            <input class="form-control" type="hidden" name="idHabitacion" id="idReserva" value="<?php echo $idHabitacion; ?>">
            </div>

            <div class="form-group">
            <input class="form-control" type="hidden" name="idReserva" id="idReserva" value="<?php echo $idReserva; ?>">
            </div>

            <div class="form-group">
            <label for="nombre">Tipo de habitación</label>
            <select name="tipo_habitacion" id="tipo_habitacion" class="form-control" style="width: 50%;">
      <option value="">Selecciona un tipo de habitación</option>
      <option <?php if($habitacion->getTipoHabitacion()=='Sencilla') { echo 'selected';} ?> value="Sencilla">Sencilla</option>
      <option <?php if($habitacion->getTipoHabitacion()=='Doble') { echo 'selected';} ?> value="Doble">Doble</option>
      <option <?php if($habitacion->getTipoHabitacion()=='Triple') { echo 'selected';} ?> value="Triple">Triple</option>
      <option <?php if($habitacion->getTipoHabitacion()=='Cuatruple') { echo 'selected';} ?> value="Cuatruple">Cuatruple</option>
      <option <?php if($habitacion->getTipoHabitacion()=='Familiar') { echo 'selected';} ?> value="Familiar">Familiar</option>
    </select>
            </div>
          

            <div class="form-group">
            <label for="nombre">Suplemento</label>
            <select name="suplemento" id="suplemento" class="form-control" style="width: 50%;">
      <option value="">Selecciona un suplemento</option>
      <option <?php if($habitacion->getSuplemento()=='Estándar') { echo 'selected';} ?>  value="Estándar">Estándar</option>
      <option <?php if($habitacion->getSuplemento()=='Vista al mar') { echo 'selected';} ?> value="Vista al mar">Vista al mar</option>
      <option <?php if($habitacion->getSuplemento()=='Vista al jardín') { echo 'selected';} ?> value="Vista al jardín">Vista al jardín</option>
      <option <?php if($habitacion->getSuplemento()=='Vista a la piscina') { echo 'selected';} ?> value="Vista a la piscina">Vista a la piscina</option>
      <option <?php if($habitacion->getSuplemento()=='Vista a la montaña') { echo 'selected';} ?> value="Vista a la montaña">Vista a la montaña</option>
      <option <?php if($habitacion->getSuplemento()=='Superior') { echo 'selected';} ?> value="Superior">Superior</option>
       
                                                  
    </select>
            </div>

            <div class="form-group">
            <label for="nombre">Plan de alimento</label>
            <select name="plan_alimento" id="plan_alimento" class="form-control" style="width: 50%;">
            <option value="">Selecciona un plan de alimento</option>
            <option  <?php if($habitacion->getPlanAlimento()=='Sin Alimentos') { echo 'selected';} ?> value="Sin Alimentos">Sin Alimentos(Europeo)</option>
            <option  <?php if($habitacion->getPlanAlimento()=='Desayuno Americano') { echo 'selected';} ?> value="Desayuno Americano">Desayuno Americano</option>
            <option  <?php if($habitacion->getPlanAlimento()=='Desayuno Continental') { echo 'selected';} ?> value="Desayuno Continental">Desayuno Continental</option>
            <option  <?php if($habitacion->getPlanAlimento()=='Desayuno Buffete') { echo 'selected';} ?> value="Desayuno Buffete">Desayuno Buffete</option>
            <option  <?php if($habitacion->getPlanAlimento()=='Bebidas Incluidas') { echo 'selected';} ?> value="Bebidas incluidas">Bebidas incluidas</option>
            <option  <?php if($habitacion->getPlanAlimento()=='Desayuno, comida, cena') { echo 'selected';} ?> value="Desayuno, comida, cena">Desayuno, comida, cena</option>
            <option  <?php if($habitacion->getPlanAlimento()=='Todo incluido') { echo 'selected';} ?> value="Todo incluido">Todo incluido</option>
       
                                                  
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