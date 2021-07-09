<!--   Habitacion 1 -->

<div id="habitacion1">

  <p class="font-weight-bold">Habitaciones</p>

  <label class="badge badge-primary">Habitación 1</label>
  <br>

  <div class="form-group form-inline">
    <label for="tipo_habitacion1">Tipo de habitación <span class="text text-danger mr-2">*</span></label>
    <select name="tipo_habitacion1" id="tipo_habitacion1" class="form-control" style="width: 30%;">
      <option value="">Selecciona un tipo de habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?>
        </option>
      <?php endforeach; ?>

    </select>
  </div>

  <div class="form-group form-inline">
    <label for="suplemento2">Suplemento <span class="text text-danger mr-2">*</span></label>
    <select name="suplemento2" id="suplemento2" class="form-control" style="width: 35%;">
      <option value="">Selecciona el suplemento para habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?>
        </option>
      <?php endforeach; ?>

    </select>
  </div>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#habitacion2" aria-expanded="false" aria-controls="collapseExample" id="btnHab2" onclick="hab2()">
    <i class="fas fa-plus"></i>
  </button>



</div>

<!--   Habitacion 2 -->

<div class="collapse" id="habitacion2">
  <hr>

  <p class="badge badge-primary" for="tipo_habitacion">Habitación 2</p>
  <br>
  <div class="form-group form-inline">
    <label for="tipo_habitacion">Tipo de habitación &nbsp;</label>
    <select name="tipo_habitacion" id="tipo_habitacion" class="form-control" style="width: 30%;">
      <option value="">Selecciona un tipo de habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?>
        </option>
      <?php endforeach; ?>

    </select>
  </div>

  <div class="form-group form-inline">
    <label for="suplemento">Suplemento &nbsp;</label>
    <select name="suplemento" id="suplemento" class="form-control" style="width: 35%;">
      <option value="">Selecciona el suplemento para habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?>
        </option>
      <?php endforeach; ?>

    </select>
  </div>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#habitacion3" aria-expanded="false" aria-controls="collapseExample" id="btnHab3" onclick="hab3()">
    <i class="fas fa-plus"></i>
  </button>

  <!-- <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#habitacion2" aria-expanded="false" aria-controls="collapseExample" id="btnHab2_cancelar" onclick="hab2_cancelar()">
<i class="fas fa-trash-alt"></i>
</button> -->

</div>



<!--   Habitacion 3 -->

<div class="collapse" id="habitacion3">
  <hr>

  <p class="badge badge-primary" for="tipo_habitacion">Habitación 3</p>
  <br>
  <div class="form-group form-inline">
    <label for="tipo_habitacion">Tipo de habitación &nbsp;</label>
    <select name="tipo_habitacion" id="tipo_habitacion" class="form-control" style="width: 30%;">
      <option value="">Selecciona un tipo de habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?>
        </option>
      <?php endforeach; ?>

    </select>
  </div>

  <div class="form-group form-inline">
    <label for="suplemento">Suplemento &nbsp;</label>
    <select name="suplemento" id="suplemento" class="form-control" style="width: 35%;">
      <option value="">Selecciona el suplemento para habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?> </option>
      <?php endforeach; ?>

    </select>
  </div>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#habitacion4" aria-expanded="false" aria-controls="collapseExample" id="btnHab4" onclick="hab4()">
    <i class="fas fa-plus"></i>
  </button>


</div>

<!--   Habitacion 4 -->

<div class="collapse" id="habitacion4">
  <hr>

  <p class="badge badge-primary" for="tipo_habitacion">Habitación 4</p>
  <br>
  <div class="form-group form-inline">
    <label for="tipo_habitacion">Tipo de habitación &nbsp;</label>
    <select name="tipo_habitacion" id="tipo_habitacion" class="form-control" style="width: 30%;">
      <option value="">Selecciona un tipo de habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?>
        </option>
      <?php endforeach; ?>

    </select>
  </div>

  <div class="form-group form-inline">
    <label for="suplemento">Suplemento &nbsp;</label>
    <select name="suplemento" id="suplemento" class="form-control" style="width: 35%;">
      <option value="">Selecciona el suplemento para habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?>
        </option>
      <?php endforeach; ?>

    </select>
  </div>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#habitacion5" aria-expanded="false" aria-controls="collapseExample" id="btnHab5" onclick="hab5()">
    <i class="fas fa-plus"></i>
  </button>

</div>


<!--   Habitacion 5 -->

<div class="collapse" id="habitacion5">
  <hr>

  <p class="badge badge-primary" for="tipo_habitacion">Habitación 5</p>
  <br>
  <div class="form-group form-inline">
    <label for="tipo_habitacion">Tipo de habitación &nbsp;</label>
    <select name="tipo_habitacion" id="tipo_habitacion" class="form-control" style="width: 30%;">
      <option value="">Selecciona un tipo de habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?>
        </option>
      <?php endforeach; ?>

    </select>
  </div>

  <div class="form-group form-inline">
    <label for="suplemento">Suplemento &nbsp;</label>
    <select name="suplemento" id="suplemento" class="form-control" style="width: 35%;">
      <option value="">Selecciona el suplemento para habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?>
        </option>
      <?php endforeach; ?>

    </select>
  </div>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#habitacion6" aria-expanded="false" aria-controls="collapseExample" id="btnHab6" onclick="hab6()">
    <i class="fas fa-plus"></i>
  </button>

</div>


<!--   Habitacion 6 -->

<div class="collapse" id="habitacion6">
  <hr>

  <p class="badge badge-primary" for="tipo_habitacion">Habitación 6</p>
  <br>
  <div class="form-group form-inline">
    <label for="tipo_habitacion">Tipo de habitación &nbsp;</label>
    <select name="tipo_habitacion" id="tipo_habitacion" class="form-control" style="width: 30%;">
      <option value="">Selecciona un tipo de habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?> </option>
      <?php endforeach; ?>

    </select>
  </div>

  <div class="form-group form-inline">
    <label for="suplemento">Suplemento &nbsp;</label>
    <select name="suplemento" id="suplemento" class="form-control" style="width: 35%;">
      <option value="">Selecciona el suplemento para habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?> </option>
      <?php endforeach; ?>

    </select>
  </div>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#habitacion7" aria-expanded="false" aria-controls="collapseExample" id="btnHab7" onclick="hab7()">
    <i class="fas fa-plus"></i>
  </button>
</div>


<!--   Habitacion 7 -->
<div class="collapse" id="habitacion7">
  <hr>

  <p class="badge badge-primary" for="tipo_habitacion">Habitación 7</p>
  <br>
  <div class="form-group form-inline">
    <label for="tipo_habitacion">Tipo de habitación &nbsp;</label>
    <select name="tipo_habitacion" id="tipo_habitacion" class="form-control" style="width: 30%;">
      <option value="">Selecciona un tipo de habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?> </option>
      <?php endforeach; ?>

    </select>
  </div>

  <div class="form-group form-inline">
    <label for="suplemento">Suplemento &nbsp;</label>
    <select name="suplemento" id="suplemento" class="form-control" style="width: 35%;">
      <option value="">Selecciona el suplemento para habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?> </option>
      <?php endforeach; ?>

    </select>
  </div>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#habitacion8" aria-expanded="false" aria-controls="collapseExample" id="btnHab8" onclick="hab8()">
    <i class="fas fa-plus"></i>
  </button>

</div>

<!--   Habitacion 8 -->
<div class="collapse" id="habitacion8">
  <hr>

  <p class="badge badge-primary" for="tipo_habitacion">Habitación 8</p>
  <br>
  <div class="form-group form-inline">
    <label for="tipo_habitacion">Tipo de habitación &nbsp;</label>
    <select name="tipo_habitacion" id="tipo_habitacion" class="form-control" style="width: 30%;">
      <option value="">Selecciona un tipo de habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?> </option>
      <?php endforeach; ?>

    </select>
  </div>

  <div class="form-group form-inline">
    <label for="suplemento">Suplemento &nbsp;</label>
    <select name="suplemento" id="suplemento" class="form-control" style="width: 35%;">
      <option value="">Selecciona el suplemento para habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?> </option>
      <?php endforeach; ?>

    </select>
  </div>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#habitacion9" aria-expanded="false" aria-controls="collapseExample" id="btnHab9" onclick="hab9()">
    <i class="fas fa-plus"></i>
  </button>

</div>


<!--   Habitacion 9 -->
<div class="collapse" id="habitacion9">
  <hr>

  <p class="badge badge-primary" for="tipo_habitacion">Habitación 9</p>
  <br>
  <div class="form-group form-inline">
    <label for="tipo_habitacion">Tipo de habitación &nbsp;</label>
    <select name="tipo_habitacion" id="tipo_habitacion" class="form-control" style="width: 30%;">
      <option value="">Selecciona un tipo de habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?> </option>
      <?php endforeach; ?>

    </select>
  </div>

  <div class="form-group form-inline">
    <label for="suplemento">Suplemento &nbsp;</label>
    <select name="suplemento" id="suplemento" class="form-control" style="width: 35%;">
      <option value="">Selecciona el suplemento para habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?> </option>
      <?php endforeach; ?>

    </select>
  </div>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#habitacion10" aria-expanded="false" aria-controls="collapseExample" id="btnHab10" onclick="hab10()">
    <i class="fas fa-plus"></i>
  </button>

</div>


<!--   Habitacion 10 -->
<div class="collapse" id="habitacion10">
  <hr>

  <p class="badge badge-primary" for="tipo_habitacion">Habitación 10</p>
  <br>
  <div class="form-group form-inline">
    <label for="tipo_habitacion9">Tipo de habitación &nbsp;</label>
    <select name="tipo_habitacion9" id="tipo_habitacion9" class="form-control" style="width: 30%;">
      <option value="">Selecciona un tipo de habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?> </option>
      <?php endforeach; ?>

    </select>
  </div>

  <div class="form-group form-inline">
    <label for="suplemento9">Suplemento &nbsp;</label>
    <select name="suplemento9" id="suplemento9" class="form-control" style="width: 35%;">
      <option value="">Selecciona el suplemento para habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?> </option>
      <?php endforeach; ?>

    </select>
  </div>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#habitacion11" aria-expanded="false" aria-controls="collapseExample" id="btnHab11" onclick="hab11()">
    <i class="fas fa-plus"></i>
  </button>

</div>

<!--   Habitacion 11 -->
<div class="collapse" id="habitacion11">
  <hr>

  <p class="badge badge-primary" for="tipo_habitacion">Habitación 11</p>
  <br>
  <div class="form-group form-inline">
    <label for="tipo_habitacion">Tipo de habitación &nbsp;</label>
    <select name="tipo_habitacion" id="tipo_habitacion" class="form-control" style="width: 30%;">
      <option value="">Selecciona un tipo de habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?> </option>
      <?php endforeach; ?>

    </select>
  </div>

  <div class="form-group form-inline">
    <label for="suplemento">Suplemento &nbsp;</label>
    <select name="suplemento" id="suplemento" class="form-control" style="width: 35%;">
      <option value="">Selecciona el suplemento para habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?> </option>
      <?php endforeach; ?>

    </select>
  </div>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#habitacion12" aria-expanded="false" aria-controls="collapseExample" id="btnHab12" onclick="hab12()">
    <i class="fas fa-plus"></i>
  </button>

</div>


<!--   Habitacion 12 -->
<div class="collapse" id="habitacion12">
  <hr>

  <p class="badge badge-primary" for="tipo_habitacion">Habitación 12</p>
  <br>
  <div class="form-group form-inline">
    <label for="tipo_habitacion">Tipo de habitación &nbsp;</label>
    <select name="tipo_habitacion" id="tipo_habitacion" class="form-control" style="width: 30%;">
      <option value="">Selecciona un tipo de habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?> </option>
      <?php endforeach; ?>

    </select>
  </div>

  <div class="form-group form-inline">
    <label for="suplemento">Suplemento &nbsp;</label>
    <select name="suplemento" id="suplemento" class="form-control" style="width: 35%;">
      <option value="">Selecciona el suplemento para habitación</option>
      <?php foreach ($agencias as $agencia) : ?>
        <option value="<?php echo $agencia[0]; ?>" <?php if ($reserva->getIdAgencia() == $agencia[0]) {
                                                      echo 'selected';
                                                    } ?>> <?php echo $agencia['nombre_comercial']; ?> </option>
      <?php endforeach; ?>

    </select>
  </div>

 <!--  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#habitacion13" aria-expanded="false" aria-controls="collapseExample" id="btnHab13" onclick="hab13()">
    <i class="fas fa-plus"></i>
  </button> -->

</div>



<script>
  

  function hab2() {
    document.getElementById('btnHab2').style.display = 'none';
  }

  /* function hab2_cancelar() {
  document.getElementById('btnHab2').style.display = 'block';
  }  */

  //Habitación 3

  function hab3() {
    document.getElementById('btnHab3').style.display = 'none';
  }


  //Habitación 4

  function hab4() {
    document.getElementById('btnHab4').style.display = 'none';
  }

  //Habitación 5

  function hab5() {
    document.getElementById('btnHab5').style.display = 'none';
  }

  //Habitación 6

  function hab6() {
    document.getElementById('btnHab6').style.display = 'none';
  }

  //Habitación 7

  function hab7() {
    document.getElementById('btnHab7').style.display = 'none';
  }

  //Habitación 8

  function hab8() {
    document.getElementById('btnHab8').style.display = 'none';
  }

  //Habitación 9

  function hab9() {
    document.getElementById('btnHab9').style.display = 'none';
  }

  //Habitación 10

  function hab10() {
    document.getElementById('btnHab10').style.display = 'none';
  }

  //Habitación 11

  function hab11() {
    document.getElementById('btnHab11').style.display = 'none';
  }

  //Habitación 12

  function hab12() {
    document.getElementById('btnHab12').style.display = 'none';
  }


   //Habitación 13

   function hab13() {
    document.getElementById('btnHab13').style.display = 'none';
  }

   //Habitación 14

   function hab14() {
    document.getElementById('btnHab14').style.display = 'none';
  }

   //Habitación 15

   function hab15() {
    document.getElementById('btnHab15').style.display = 'none';
  }
</script>