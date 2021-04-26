<?php
include_once ('../../assets/template/header.php');
require_once ('../../class/Agencia.php');
$agencia = Agencia::recuperarTodos();
?>
<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <h3 class="text-center">Administrar Agencias</h3>

            <div> 
            <?php
              if(isset($_GET['status_code'])){
                if($_GET['status_code']==1){
                  ?>
                                      
                    <div class="alert alert-primary alert-dismissible fade show bg-message" role="alert">
                      Registro realizado correctamente.
                      <button type="button" class="close close-icon" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                <?php
                }elseif($_GET['status_code']==2){
                ?>

                  <div class="alert alert-primary alert-dismissible fade show bg-message" role="alert">
                      Registro actualizado correctamente.
                      <button type="button" class="close close-icon" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                 <?php
                }else{
                  ?>

                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      Error al intentar procesar esta acción.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                <?php
                }

              }
            ?>
            </div>
            <br>
            
            <a href="save.php" class="btn btn-default btn-custom" > <i class="fas fa-plus"></i> Nueva Agencia</a><br><br>
 
          <?php  if (count($agencia) > 0): ?>

            <a href="export_report.php" class="btn btn-default btn-custom" > <i class="fas fa-file-excel"></i> Exportar a Excel</a><br><br>


            <table class="table table-bordered"  id="table-data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Logo</th>
      <th scope="col">Nombre Comercial</th>
      <th scope="col">Fecha de registro</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($agencia as $item): 
    ?>

    <tr>
      <td><img src="<?php echo $item['logo']; ?>" class="article-image-thumbnail3"> </td>
      <td><?php echo $item['nombre_comercial'] ?></td>
      <td><?php $date= date_create($item['fecha_creacion']); echo date_format($date,"d-m-Y"); ?></td>
      <td class="text-center"><a href="save.php?idAgencia=<?php echo $item[0];?>" class="btn btn-warning far fa-edit"></a></td>
      <td class="text-center"><a href="delete.php?idAgencia=<?php echo $item[0];?>" onclick="return confirm('¿Está seguro que desea eliminar este registro?')" class="btn btn-danger far fa-trash-alt"></a></td> 

    </tr>
  <?php 
endforeach; ?>
  </tbody>
</table> <br>
<?php else: ?>
            <p class="alert alert-info"> No hay agencias registradas </p>
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