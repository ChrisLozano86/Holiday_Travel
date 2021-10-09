<?php
require_once '../../class/DestinosTres.php';
require_once '../../class/CategoriaTres.php';
include_once '../../assets/template/header.php';
$promociones = DestinosTres::recuperarTodos();
$categoria = CategoriaTres::recuperarTodos();
?>

<!-- Main content -->
<div class="content" id="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <h3 class="text-center"> Administrar Categoría 3</h3>
<!-- 
        <a href="save.php" class="btn btn-default btn-custom"> <i class="fas fa-plus"></i> Agregar nuevo destino</a><br><br> -->

        <br>

        <?php if (count($categoria) > 0) : ?>

          <hr>

          <table class="table table-bordered" id="table-data1">
            <thead class="thead-light ">
              <tr class="text-center">
                
                <th scope="col" >Nombre de la categoría</th>
                <th scope="col">Visible</th>
                <th scope="col">Editar</th>
                <!-- <th scope="col">Eliminar</th> -->

              </tr>
            </thead>
            <tbody>
              <?php foreach ($categoria as $item) : ?>

                <tr>
                  <td class="text-center"><?php echo $item['nombre']; ?></td>
                 
                  <td class="text-center"><?php if ($item['visible'] == 1) {
                                            echo '<a href="#" class="btn btn-success fas fa-check-circle lock" alt="Visible"></a>';
                                          } else {
                                            echo '<a href="#" class="btn btn-warning fas fa-pause-circle lock" alt="No Visible"></a>';
                                          } ?></td>
                  <td class="text-center"><a href="save_category.php?idCategoria=<?php echo $item[0]; ?>" class="btn btn-warning far fa-edit"></a></td>
                  <!-- <td class="text-center"><a href="delete.php?idCategoria=" onclick="return confirm('¿Está seguro que desea eliminar esta categoría?')" class="btn btn-danger far fa-trash-alt"></a></td> -->
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>


        <?php endif; ?>


      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<br><br>
<!-- Fin categoría -->



<!-- Main content -->
<div class="content" id="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <h3 class="text-center"> Administrar Tarjetas de Categoría 3</h3>

        <a href="save.php" class="btn btn-default btn-custom"> <i class="fas fa-plus"></i> Agregar nueva tarjeta</a><br><br>

        <br>

        <?php if (count($promociones) > 0) : ?>

          <hr>

          <table class="table table-bordered" id="table-data">
            <thead class="thead-dark">
              <tr class="text-center">

                <th scope="col">Imagen del destino</th>
                <th scope="col">Título del destino</th>
                <th scope="col">Fecha de Publicación</th>
                <th scope="col">Visible</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>

              </tr>
            </thead>
            <tbody>
              <?php foreach ($promociones as $item) : ?>

                <!-- Modal -->
                <div class="modal fade" id="showDetailSlider<?php echo $item[0] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $item['titulo'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <img src="<?php echo $item['url_imagen1']; ?>" class="article-image-thumbnail2">
                        <br>
                        <p class="ml-4">Publicado el: <?php $date = date_create($item['fecha_publicacion']);
                                                      echo date_format($date, "d-m-Y"); ?></p>
                     
              
                        <?php if ($item['visible'] == 0) {
                          echo '<p class="alert alert-warning" ">Actualmente esta tarjeta no esta visible</p>';
                        } else {
                          echo '<p class="alert alert-success">Tarjeta visible en el sitio web</p';
                        } ?> </p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <a href="save.php?idPromocion=<?php echo $item[0]; ?>" class="btn btn-warning far fa-edit">Editar información</a>
                      </div>
                    </div>
                  </div>
                </div>
                <tr>

                  <td><a href="#" data-toggle="modal" data-target="#showDetailSlider<?php echo $item[0] ?>"> <img src="<?php echo $item['url_imagen1']; ?>" class="article-image-thumbnail"> </a></td>
                  <td><?php echo $item['titulo']; ?></td>
                  <td><?php $date = date_create($item['fecha_publicacion']);
                      echo date_format($date, "d-m-Y"); ?></td>
                  <td class="text-center"><?php if ($item['visible'] == 1) {
                                            echo '<a href="#" class="btn btn-success fas fa-check-circle lock" alt="Visible"></a>';
                                          } else {
                                            echo '<a href="#" class="btn btn-warning fas fa-pause-circle lock" alt="No Visible"></a>';
                                          } ?></td>
                  <td class="text-center"><a href="save.php?idPromocion=<?php echo $item[0]; ?>" class="btn btn-warning far fa-edit"></a></td>
                  <td class="text-center"><a href="delete.php?idPromocion=<?php echo $item[0]; ?>" onclick="return confirm('¿Está seguro que desea eliminar esta tarjeta?')" class="btn btn-danger far fa-trash-alt"></a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>


        <?php else : ?>
          <p class="alert alert-info"> No se encontraron tarjetas </p>
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