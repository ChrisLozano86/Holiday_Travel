<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Holidaytravel">
    <meta name="keywords" content="holidaytravel, travel, viajar, viajes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CPANEL | Holiday Travel</title>
    <!--Icon-->
    <link rel="shortcut icon" href="../../img/favicon.png">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../../css/bootstrap.min.css" type="text/css">
    <script src="../../../js/jquery-3.3.1.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
  
</head>

<body>
  

<?php
if(isset($_GET['status_code'])){ 

    $idReserva= $_GET['idReserva'];
    $title = "Agencia";

    if($_GET['status_code']==1){
        $message="El pago ha sido registrado correctamente.";
    }

    if($_GET['status_code']==2){
        $message="El pago de este reservación se cubierto en su totalidad.";
    }

    if($_GET['status_code']==3){
      $title = "Operadora";
      $message="El pago ha sido registrado correctamente.";
  }
?>
                  <script>
                  $(document).ready(function()
                  {
                    $('#successModal').modal({backdrop: 'static', keyboard: false}); 
                     $("#successModal").modal("show");
                    
                  }); 
                  </script>
                  <?php
              
            }

  if(isset($_GET['processing'])){

    if($_GET['processing']==1){
      $message="Eliminando historial de pago...";
  }
    

?>
                <script>
                  $(document).ready(function()
                  {
                    $('#LoadingModal').modal({backdrop: 'static', keyboard: false}); 
                     $("#LoadingModal").modal("show");
                    
                  }); 


                  window.onload = updateClock;
      //var totalTime = 8;
      function updateClock() {
      document.getElementById('countdown').innerHTML = totalTime;
      if(totalTime==0){
        windows.location.replace('../reservations/index.php');
      }else{
      //totalTime-=1;
      setTimeout("updateClock()",1000);
      }
      }
     setTimeout("location.href='../reservations/index.php'", 2000);




                  </script>
<?php
  }
            ?>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Referencia de Pago <?php echo $title;?></h5>
       <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
          <!-- span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <div class="modal-body">
        <img src="../../../img/success2.gif" class="d-block mx-auto img-fluid" style="width: 50%; height:auto;">
        <p class="text-center"><?php echo $message;?></p>

      </div>
      
       <div class="modal-footer">
       <form action="index.php" method="post">
       <input type="hidden" name="idReserva" value="<?php echo $idReserva; ?>">
       <div class="form-group form-inline">
       <a href="../reservations/index.php" class="btn btn-success mr-2">Ver todas las reservaciones</a>
       <?php
       if($_GET['status_code']!=3){ 
       ?>
       <button type="submit" class="btn btn-secondary">Detalles</button>
      <?php
       }
      ?>
       </div>
       </form>
        
      </div>
    </div>
  </div>
</div>


<!-- Loading Modal -->
<div class="modal fade" id="LoadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <img src="../../../img/load2.gif" class="d-block mx-auto img-fluid" style="width: 15%; height:auto;">
        <br>
        <p class="text-center"><?php echo $message; ?></p>

      </div>

      </div>
    </div>
  </div>
</div>

  
</body>

</html>