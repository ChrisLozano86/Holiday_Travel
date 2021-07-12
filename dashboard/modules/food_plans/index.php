<?php
include_once '../../assets/template/header.php';
require_once ('../../class/PlanAlimento.php');
$plan_alimentos = PlanAlimento::recuperarTodos();

?>
<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">

          <h3>Administrar planes de alimento</h3>
          
            <a href="save.php" class="btn btn-primary"><i class="fas fa-plus-circle fa-2x"></i></a><br><br>
            <?php  if (count($plan_alimentos) > 0): ?>
            <table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Plan de Alimento</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>

      
    </tr>
  </thead>
  <tbody>
    <?php 
    
    foreach ($plan_alimentos as $item):
   
     ?>
    <tr>
     
     <td><?php echo $item['plan'];?></td>
     <td><?php echo $item['descripcion'];?></td>
     <td class="text-center"><a href="save.php?idPlanAlimento=<?php echo $item[0];?>" class="btn btn-warning far fa-edit"></a></td>
     <td class="text-center"><a href="delete.php?idPlanAlimento=<?php echo $item[0];?>" onclick="return confirm('¿Está seguro que desea eliminar este registro?')" class="btn btn-danger fas fa-trash-alt"></a></td> 
      

    <?php 

    endforeach;
    ?>


   </tr>
  </tbody>
</table>
<?php else: ?>
            <p class="alert alert-warning"> No hay planes de alimento registrados</p>
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