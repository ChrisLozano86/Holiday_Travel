<?php
require_once '../../class/Circuito.php';
$idSlider = (isset($_REQUEST['idSlider'])) ? $_REQUEST['idSlider'] : null;

if ($idSlider) {
  $slider = Circuito::buscarPorId($idSlider);
} else {
  $slider = new Circuito();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : null;
  $imguno = (isset($_POST['imguno'])) ? $_POST['imguno'] : null;
  $imgdos = (isset($_POST['imgdos'])) ? $_POST['imgdos'] : null;
  $video = (isset($_POST['video'])) ? $_POST['video'] : null;
  $paises = (isset($_POST['paises'])) ? $_POST['paises'] : null;
  $ciudades = (isset($_POST['ciudades'])) ? $_POST['ciudades'] : null;
  $incluye = (isset($_POST['incluye'])) ? $_POST['incluye'] : null;
  $no_incluye = (isset($_POST['no_incluye'])) ? $_POST['no_incluye'] : null;
  $itinerario = (isset($_POST['itinerario'])) ? $_POST['itinerario'] : null;
  $tarifas = (isset($_POST['tarifas'])) ? $_POST['tarifas'] : null;
  $hoteles = (isset($_POST['hoteles'])) ? $_POST['hoteles'] : null;
  $mapa = (isset($_POST['mapa'])) ? $_POST['mapa'] : null;
  $tours = (isset($_POST['tours'])) ? $_POST['tours'] : null;
  $visas = (isset($_POST['visas'])) ? $_POST['visas'] : null;
  $url_imagen1 = (isset($_REQUEST['url_imagen1'])) ? $_REQUEST['url_imagen1'] : null;
  $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null;
  $fecha_publicacion = date('Y-m-d');
  $keywords = (isset($_POST['keywords'])) ? $_POST['keywords'] : null;
  $visible = (isset($_REQUEST['visible'])) ? $_REQUEST['visible'] : null;

  $slider->setTitulo($titulo);
  $slider->setVideo($video);
  $slider->setPaises($paises);
  $slider->setCiudades($ciudades);
  $slider->setIncluye($incluye);
  $slider->setNoIncluye($no_incluye);
  $slider->setItinerario($itinerario);
  $slider->setTarifas($tarifas);
  $slider->setHoteles($hoteles);
  $slider->setMapa($mapa);
  $slider->setTours($tours);
  $slider->setVisas($visas);
  $slider->setDescripcion($descripcion);
  $slider->setFechaPublicacion($fecha_publicacion);
  $slider->setKeywords($keywords);
  $slider->setVisible($visible);


  $rutaServidor = 'uploads/images';
  $rutaServidorFiles = 'uploads/files';


  if ($_FILES['url_img1']['name'] != null) {

    if (!is_dir('uploads/images')) {
      mkdir('uploads/images', 0777, true);
    }

    $rutaTemporal1 = $_FILES['url_img1']['tmp_name'];
    $extension = pathinfo($_FILES['url_img1']['name'], PATHINFO_EXTENSION);
    $nombreImagen1 = date('YmdHis') . '_slider.' . $extension;
    $rutaDestino1 = $rutaServidor . '/' . $nombreImagen1;
    unlink($url_imagen1);
    move_uploaded_file($rutaTemporal1, $rutaDestino1);
    $slider->setUrlImagen1($rutaDestino1);
  } else {
    $slider->setUrlImagen1($url_imagen1);
  }

  if ($_FILES['imguno']['name'] != null) {

    if (!is_dir('uploads/images')) {
      mkdir('uploads/images', 0777, true);
    }

    $rutaTemporal2 = $_FILES['imguno']['tmp_name'];
    $extension1 = pathinfo($_FILES['imguno']['name'], PATHINFO_EXTENSION);
    $nombreImagen2 = date('YmdHis') . '_slider1.' . $extension1;
    $rutaDestino2 = $rutaServidor . '/' . $nombreImagen2;
    unlink($imguno);
    move_uploaded_file($rutaTemporal2, $rutaDestino2);
    $slider->setImgUno($rutaDestino2);
  } else {
    $slider->setImgUno($imguno);
  }

  if ($_FILES['imgdos']['name'] != null) {

    if (!is_dir('uploads/images')) {
      mkdir('uploads/images', 0777, true);
    }

    $rutaTemporal3 = $_FILES['imgdos']['tmp_name'];
    $extension3 = pathinfo($_FILES['imgdos']['name'], PATHINFO_EXTENSION);
    $nombreImagen3 = date('YmdHis') . '_slider2.' . $extension3;
    $rutaDestino3 = $rutaServidor . '/' . $nombreImagen3;
    unlink($imgdos);
    move_uploaded_file($rutaTemporal3, $rutaDestino3);
    $slider->setImgDos($rutaDestino3);
  } else {
    $slider->setImgDos($imgdos);
  }


  $slider->guardar();
  header('Location: index.php');
}

include_once '../../assets/template/header.php';
?>


<!-- Main content -->
<div class="content" id="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <a href="index.php" class="btn btn-warning">Regresar</a><br>

        <?php
        if (isset($_REQUEST['idSlider'])) {

          $title = 'Editar elemento del circuito ';
        } else {
          $title = 'Crear nuevo circuito';
        }
        ?>


        <div style="width:80%; margin-left:10%; background-color: white; padding:20px; border-radius:10px;">

          <h4 class="text-center"><?php echo $title ?></h4> <br>


          <form action="save.php" method="post" id="slider_form" enctype="multipart/form-data">

            <div class="form-group">
              <input class="form-control" type="hidden" name="idSlider" id="idSlider" value="<?php echo $slider->getIdSlider(); ?>">
            </div>

            <div class="form-group">
              <input class="form-control" type="hidden" name="url_imagen1" id="url_imagen1" value="<?php echo $slider->getUrlImagen1(); ?>">
            </div>
            <div class="form-group">
              <input class="form-control" type="hidden" name="imguno" id="imguno" value="<?php echo $slider->getImgUno(); ?>">
            </div>
            <div class="form-group">
              <input class="form-control" type="hidden" name="imgdos" id="imgdos" value="<?php echo $slider->getImgDos(); ?>">
            </div>


            <div class="form-group">
              <label for="titulo">Título:</label>
              <input class="form-control" type="text" name="titulo" id="titulo" value="<?php echo $slider->getTitulo(); ?>">
            </div>

            <!--SLIDER DEL CIRCUITO-->
            <div class="form-group">
              <label for="imguno">Imagen 1 Slider Circuito  </label>
              <?php if (isset($_REQUEST['idSlider'])) : ?>
                </br>
                <img src="<?= $slider->getImgUno(); ?>" style="width:100px" />
                </br></br>
              <?php endif; ?>
              <input type="file" class="form-control-file" name="imguno" id="imguno" <?php if ($slider->getIdSlider() == "") {
                                                                                            echo 'required';
                                                                                          } ?>>
              <small> Selecciona una imagen con las siguientes características:</small>
              <ul>
                <li><small>Dimensiones de 1200 x 600 pixeles en formato JPG o PNG</small></li>
                <li><small>Tamaño menor a 400kb</small></li>
              </ul>

            </div>

            <div class="form-group">
              <label for="imgdos">Imagen 2 Slider Circuito  </label>
              <?php if (isset($_REQUEST['idSlider'])) : ?>
                </br>
                <img src="<?= $slider->getImgDos(); ?>" style="width:100px" />
                </br></br>
              <?php endif; ?>
              <input type="file" class="form-control-file" name="imgdos" id="imgdos" <?php if ($slider->getIdSlider() == "") {
                                                                                            echo 'required';
                                                                                          } ?>>
              <small> Selecciona una imagen con las siguientes características:</small>
              <ul>
                <li><small>Dimensiones de 1200 x 600 pixeles en formato JPG o PNG</small></li>
                <li><small>Tamaño menor a 400kb</small></li>
              </ul>

            </div>

            <div class="form-group">
            <label for="video">Url del video del Slider (youtube) <small>(Opcional)</small></label>
            <input class="form-control" type="text" name="video" id="video" placeholder="Ingresa enlace del video de youtube" value="<?php echo $slider->getVideo(); ?>">
            </div>

            <!--FIN DEL SLIDER DEL CIRCUITO-->

            <div class="form-group">
              <label for="paises">Países que se visitan:</label>
              <input class="form-control" type="text" name="paises" id="paises" value="<?php echo $slider->getPaises(); ?>">
            </div>

            <div class="form-group">
              <label for="ciudades">Ciudades que se visitan:</label>
              <input class="form-control" type="text" name="ciudades" id="ciudades" value="<?php echo $slider->getCiudades(); ?>">
            </div>

            <div class="form-group">
              <label for="incluye">El viaje incluye:</label>
              <textarea class="form-control ckeditor" name="incluye" id="incluye"  rows="8"><?php echo $slider->getIncluye(); ?></textarea>
            </div>

            <div class="form-group">
              <label for="no_incluye">El viaje NO incluye:</label>
              <textarea class="form-control ckeditor" name="no_incluye" id="no_incluye"  rows="8"><?php echo $slider->getNoIncluye(); ?></textarea>
            </div>

            <div class="form-group">
              <label for="itinerario">Itinerario:</label>
              <textarea class="form-control ckeditor" name="itinerario" id="itinerario"  rows="20"><?php echo $slider->getItinerario() ?></textarea>
            </div>

            <div class="form-group">
              <label for="tarifas">Tarifas:</label>
              <textarea class="form-control ckeditor" name="tarifas" id="tarifas"  rows="5"><?php echo $slider->getTarifas(); ?></textarea>
            </div>

            <div class="form-group">
              <label for="hoteles">Hoteles:</label>
              <textarea class="form-control ckeditor" name="hoteles" id="hoteles"  rows="5"><?php echo $slider->getHoteles(); ?></textarea>
            </div>

            <div class="form-group">
            <label for="google_maps">Google Maps <small>(Opcional)</small></label>
            <input class="form-control" type="text" name="mapa" id="mapa" placeholder="Ingresa enlace del país en Google Maps" value="<?php echo $slider->getMapa(); ?>">
            </div>

            <div class="form-group">
              <label for="tours_opcionales">Tours opcionales:</label>
              <textarea class="form-control ckeditor" name="tours" id="tours"  rows="5"><?php echo $slider->getTours(); ?></textarea>
            </div>

            <div class="form-group">
              <label for="visas">Visas:</label>
              <textarea class="form-control ckeditor" name="visas" id="visas"  rows="5"><?php echo $slider->getVisas(); ?></textarea>
            </div>



            <div class="form-group">
              <label for="url_img1">Imagen Circuito <small> Es la que aparece en la busqueda:</small> </label>
              <?php if (isset($_REQUEST['idSlider'])) : ?>
                </br>
                <img src="<?= $slider->getUrlImagen1(); ?>" style="width:100px" />
                </br></br>
              <?php endif; ?>
              <input type="file" class="form-control-file" name="url_img1" id="url_img1" <?php if ($slider->getIdSlider() == "") {
                                                                                            echo 'required';
                                                                                          } ?>>
              <small> Selecciona una imagen con las siguientes características:</small>
              <ul>
                <li><small>Dimensiones de 800 x 600 pixeles en formato JPG o PNG</small></li>
                <li><small>Tamaño menor a 400kb</small></li>
              </ul>

            </div>

            <div class="form-group">
              <label for="contenido">Descripción</label>
              <textarea class="form-control" name="descripcion" id="descripcion" placeholder="breve descripción aparecerá en la busqueda" rows="3"><?php echo $slider->getDescripcion(); ?></textarea>
            </div>

            <div class="form-group">
              <label for="titulo">Keywords</label>
              <input class="form-control" type="text" name="keywords" id="keywords" placeholder="palabras clave para la busqueda del circuito" value="<?php echo $slider->getKeywords(); ?>">
            </div>

            <div class="form-group">
              <label for="visible">Visible</label>
              <select name="visible" id="visible" class="form-control" style="width: 50%;">
                <option value="0" <?php if ($slider->getVisible() == 0) {
                                    echo 'selected';
                                  } ?>>No</option>
                <option value="1" <?php if ($slider->getVisible() == 1) {
                                    echo 'selected';
                                  } ?>>Sí</option>
              </select>
            </div>


            <div class="form-group">
              <input type="submit" class="btn btn-default btn-custom" value="Guardar">
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

<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>