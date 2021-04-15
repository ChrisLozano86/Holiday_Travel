<?php
require_once '../../class/Slider.php';
include_once '../../assets/template/header.php';
$slider = Slider::recuperarTodos();
?>

<!-- Main content -->
    <div class="content" id="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <h3 class="text-center"> Slider </h3>
            
              <a href="save.php" class="btn btn-primary btn-custom" >Agregar nueva imagen al slider </a><br><br>

              <br>

              <?php  if (count($slider) > 0): ?>

              <hr>

            <table class="table table-bordered" >
  <thead class="thead-dark">
    <tr>
    <th scope="col">Fecha de Publicación</th>
    <th scope="col">Imagen</th>
      <th scope="col">Título</th>
      <th scope="col">Visible</th>
      <th scope="col">Ver</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($slider as $item): ?>
    <tr>
      <td><?php echo $item['fecha_publicacion']; ?></td>
      <td><img src="<?php echo $item['url_imagen1']; ?>" class="article-image-thumbnail"></td>
      <td><?php echo $item['titulo']; ?></td>
      <td class="text-center"><?php if($item['visible']==1){ echo '<i class="btn btn-success fas fa-check-circle"></i>'; }else{ echo '<i class="btn btn-warning fas fa-pause-circle"></i>'; } ?></td>
      <td class="text-center"><a href="#" class="btn btn-info far fa-eye"></a></td>
      <td class="text-center"><a href="save.php?idSlider=<?php echo $item[0];?>" class="btn btn-warning far fa-edit"></a></td>
      <td class="text-center"><a href="delete.php?idSlider=<?php echo $item[0];?>" onclick="return confirm('¿Está seguro que desea eliminar este registro?')" class="btn btn-danger far fa-trash-alt"></a></td> 
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php else: ?>
            <p class="alert alert-info"> No se encontraron elementos para slider </p>
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