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
            <h3 class="text-center">Administrar Comsiones de Agencias</h3>

            <div> 
            <?php
              if(isset($_GET['status_code'])){
                if($_GET['status_code']==1){
                  ?>
                                      
                    <div class="alert alert-primary alert-dismissible fade show bg-message" role="alert">
                      Los cambios se han guardado correctamente.
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
            
            
 
          <?php  if (count($agencia) > 0): ?>



            <table class="table table-bordered"  id="table-data-travel-agencies">
  <thead class="thead-dark">
    <tr>
      <th scope="col" style="display: none;">ID</th>
      <th scope="col" class="text-center">Logo</th>
      <th scope="col" class="text-center">Nombre Comercial</th>
      <th scope="col" class="text-center">Markup Operadora</th>
      <th scope="col" class="text-center">Comisión Agencia</th>
      <th scope="col" class="text-center">Editar comisiones</th>
      
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($agencia as $item): 
    ?>

    <!-- Modal -->
<div class="modal fade" id="showLogo<?php echo $item[0] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $item['nombre_comercial'] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img src="../travel_agencies/<?php echo $item['logo']; ?>" class="article-image-thumbnail2">
      <br>
      <div class="text-center">
      <a href="../travel_agencies/<?php echo $item['logo']; ?>" download="<?php echo $item['nombre_comercial'].'_logo'?>" target="_blank">Descargar Logo</a>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <a href="save.php?idAgencia=<?php echo $item[0];?>" class="btn btn-warning far fa-edit">Editar información</a>
      </div>
    </div>
  </div>
</div>

    <tr>
    <td style="display: none;"><?php echo $item[0] ?></td>
    <?php
      if($item['logo']!=""){
    ?>
      <td class="text-center"><a href="#" data-toggle="modal" data-target="#showLogo<?php echo $item[0] ?>"> <img src="../travel_agencies/<?php echo $item['logo']; ?>" width="50"
      height="50"></a> </td>
    <?php
    }else{
      ?>
        <td></td>
      <?php
    }
    ?>
      
      <td><?php echo $item['nombre_comercial'] ?></td>
      <td class="text-center"> <?php if($item['markup_operadora'] != NULL){echo $item['markup_operadora'].'%';}else{ echo '<span class="badge badge-warning">No definido</span>';} ?></td>
      <td class="text-center"> <?php if($item['comision_agencia'] != NULL){echo $item['comision_agencia'].'%';}else{ echo '<span class="badge badge-warning">No definido</span>';} ?></td>
      <td class="text-center"><a href="save.php?idAgencia=<?php echo $item[0];?>" class="btn btn-custom btn-lg"><i class="fas fa-file-invoice-dollar"></i></a></td>
     

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