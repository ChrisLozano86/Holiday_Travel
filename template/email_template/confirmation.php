<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Holidaytravel">
    <meta name="keywords" content="holidaytravel, travel, viajar, viajes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>::Holiday Travel::</title>
    <!--Icon-->
    <link rel="shortcut icon" href="../../img/favicon.png">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
  
</head>

<body>
  

<?php


              if(isset($_GET['status_code'])){
                if($_GET['status_code']==1){
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
            }
            ?>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información enviada correctamente</h5>
       <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
          <!-- span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <div class="modal-body">
        <img src="../../img/success.gif" class="d-block mx-auto img-fluid" style="width: 60%; height:auto;">
        <p class="text-center font-weight-bold" style="font-size: 18px;">¡Gracias por registrarte!</p>
        <p style="font-size: 18px;">Un ejecutivo de Holiday Travel se pondrá en contacto contigo lo más pronto posible.</p>

      </div>
      <!-- div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar</button>
      </div> -->
    </div>
  </div>
</div>

    <script>

     setTimeout("location.href='../../index.php'", 5000);
    
    </script>
  
</body>

</html>