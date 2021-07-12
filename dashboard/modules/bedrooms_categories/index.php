<?php
include_once '../../assets/template/header.php';
require_once ('../../class/TipoHabitacion.php');
$tipo_habitaciones = TipoHabitacion::recuperarTodos();

?>
<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">

          <h3>Administrar tipos de habitación</h3>
          
            <a href="save.php" class="btn btn-primary"><i class="fas fa-plus-circle fa-2x"></i></a><br><br>
            <?php  if (count($tipo_habitaciones) > 0): ?>
            <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Tipo de habitación</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>

      
    </tr>
  </thead>
  <tbody>
    <?php 
    
    foreach ($tipo_habitaciones as $item):
   
     ?>
    <tr>
     
     <td><?php echo $item['tipo'];?></td>
     <td><?php echo $item['descripcion'];?></td>
     <td class="text-center"><a href="save.php?idTipoHabitacion=<?php echo $item[0];?>" class="btn btn-warning far fa-edit"></a></td>
     <td class="text-center"><a href="delete.php?idTipoHabitacion=<?php echo $item[0];?>" onclick="return confirm('¿Está seguro que desea eliminar este registro?')" class="btn btn-danger fas fa-trash-alt"></a></td> 
      

    <?php 

    endforeach;
    ?>


   </tr>
  </tbody>
</table>
<?php else: ?>
            <p class="alert alert-warning"> No hay tipos de habitaciones registradas</p>
        <?php endif; ?>
            
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