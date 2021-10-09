<?php
// session_start();
// header('Location: offline.php');
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NSY7H1BK2G"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-NSY7H1BK2G');
    </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Author Meta -->
    <meta name="author" content="HolidayTravel">
    <!-- Meta Keyword -->
    <meta name="keywords" content="HolidayTravel">
    <!-- Meta Description -->
    <meta name="description" content="Agencia de viajes Holiday Travel">
    <!-- Page Title -->
    <title> Circuitos | HolidayTravel </title>
    <!--Icon-->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="css/set1.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/whats.css">


</head>

<body>



    <div class="d-none d-md-block social-body">
        <ul>
            <li class="facebook"><a href="https://www.facebook.com/HOLIDAYTRAVELOPERADORA" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li class="twitter"><a href="https://api.whatsapp.com/send?phone=524171172034&text=%C2%A1Hola!%20me%20gustar%C3%ADa%20obtener%20m%C3%A1s%20informaci%C3%B3n%20sobre%20uno%20de%20sus%20circuitos" target="_blank"><i class="fa fa-whatsapp"></i></a></li>

            <!-- <li class="instagram"><a href="#" target="_blank"><i class="fa fa-instagram"></i></a></li> -->
            <!-- <li class="pinterest"><a href="#" target="_blank"><i class="fa fa-pinterest"></i></a></li> -->
        </ul>
    </div>




    <!--============================= HEADER =============================-->
    <div class="nav-menu">
        <div class="bg transition">
            <div class="container-fluid fixed">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg navbar-light">

                            <a class="navbar-brand" style="text-shadow: black 0.1em 0.1em 0.2em; " href="index.php">

                                <img src="images/logo.png" height="58.39px" class="d-inline-block align-top" alt=""> &nbsp;
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-menu"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav" style="text-shadow: black 0.1em 0.1em 0.2em; ">
                                    <li class="nav-item">
                                        <a class="nav-link" href="./index.php">Inicio</a>
                                    </li>



                                    <li class="nav-item">
                                        <a class="nav-link" href="../index.php#servicios" target="_blank">Servicios</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../index.php#promociones"  target="_blank">Promociones</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../index.php#exampleModal"  target="_blank">Registrate</a>
                                    </li>

                                    <!-- <li class="nav-item">
                                        <a class="nav-link" href="#">Internacional</a>
                                    </li> -->
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SLIDER -->
    <section class="slider d-flex align-items-center">

        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="slider-title_box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slider-content_wrap contenedor-texto">
                                    <h1 class="tam" style="font-size: calc(1em + 1vw);">¿A dónde deseas viajar?</h1>
                                    <h1 style="font-size: calc(1.4em + 1vw); margin-bottom:8px;"><span class="typed"></span></h1>
                                    <!-- <h5><span class="typed"></span></h5> -->
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
                                <div hidden id="errores"></div>
                                <form action="search.php" method="POST" class="form-wrap mt-4" id="formulario" autocomplete="off">
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <input type="text" name="busqueda" id="busqueda" class="text1 btn-group1">


                                        <button type="submit" class="btn-form"><span class="icon-magnifier search-icon"></span>BUSCAR<i class="pe-7s-angle-right"></i></button>
                                    </div>
                                </form>

                                <br><br>

                                <!-- <a href="#">
                                <img src="images/logo.png"  class="d-inline-block align-top" alt=""> 
                                    
                                </a> -->


                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--// SLIDER -->
    <!--//END HEADER -->

    <!--============================= Carrusel =============================-->
    <section class="main-block light-bg">
        <div class="container-fluid">

            <?php


            include_once '../dashboard/class/CircuitosCarrusel.php';
            $promo = CircuitosCarrusel::recuperarPromocionesPublicadas();

            if (count($promo) > 0) :
            ?>

                <div class="carousel">
                    <div class="carousel__contenedor">
                        <button aria-label="Anterior" class="carousel__anterior">
                            <!-- <i class="fas fa-chevron-left"></i> -->
                        </button>


                        <div class="carousel__lista" id="carousel__lista">
                            <?php foreach ($promo as $item) : ?>
                                <div class="carousel__elemento">
                                    <div class="hovereffects">

                                        <img src="../dashboard/modules/circuits_carrusel/<?php echo $item['url_imagen1']; ?>" alt="circuitos" class=" caruima">



                                    </div>



                                </div>
                            <?php endforeach; ?>
                        </div>


                        <button aria-label="Siguiente" class="carousel__siguiente">
                            <!-- <i class="fas fa-chevron-right"></i> -->
                        </button>
                    </div>

                    <!-- <div role="tablist" class="carousel__indicadores"></div> -->



                <?php endif; ?>
                </div>


        </div>


    </section>
    <!--//END CARRUSEL -->
    <br>
    <!--============================= CATEGORIAS =============================-->
    <section class="main-block light-bgs mt-5">

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- <h1 class="tama mb-4">hola</h1> -->
                </div>
                <div class="col-md-9">
                    <div class="row col-lg-6">

                        <?php

                        include_once '../dashboard/class/CategoriaUno.php';
                        $cate = CategoriaUno::recuperarCategoriasPublicadas();

                        if (count($cate) > 0) :
                        ?>
                            <?php foreach ($cate as $item) : ?>
                                <h1 class="tama mb-4"><?php echo $item['nombre']; ?> </h1>
                            <?php endforeach; ?>

                        <?php endif; ?>
                    </div>

                    <?php
                    include_once '../dashboard/class/DestinosUno.php';
                    $promo = DestinosUno::recuperarPublicados();

                    if (count($promo) > 0) :
                    ?>
                    
                    <div class="row">
                    <div class="card-deck">
                    <?php foreach ($promo as $item) : ?>
                        
                        <div class="col-lg-4 col-md-4 col-12 mt-2">
                     
                        <div class="card text-center" >
                                    <img class="card-img-top " src="../dashboard/modules/category_one/<?php echo $item['url_imagen1']; ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <i class="fa fa-plane partext2"></i>&nbsp; <i class="fa fa-building-o partext2"></i> &nbsp;<i class="fa fa-cutlery partext2" aria-hidden="true"></i>
                                        <a href="./details.php?idCircuito=<?php echo $item[0];?>" class="btn btn-info btn-lg btn-block mt-2 bo">Ver más</a>
                                    </div>
                                </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>

            </div>


            <br> <br>
            <!-- Categoría 2  -->
            <div class="row">
                <div class="col-md-3">
                    <!-- <h1 class="tama mb-4">hola</h1> -->
                </div>
                <div class="col-md-9">
                    <div class="row col-lg-6">

                        <?php

                        include_once '../dashboard/class/CategoriaDos.php';
                        $cate = CategoriaDos::recuperarCategoriasPublicadas();

                        if (count($cate) > 0) :
                        ?>
                            <?php foreach ($cate as $item) : ?>
                                <h1 class="tama mb-4"><?php echo $item['nombre']; ?> </h1>
                            <?php endforeach; ?>

                        <?php endif; ?>
                    </div>

                    <?php
                    include_once '../dashboard/class/DestinosDos.php';
                    $promo = DestinosDos::recuperarPromocionesPublicadas();

                    if (count($promo) > 0) :
                    ?>
                    
                    <div class="row">
                    <div class="card-deck">
                    <?php foreach ($promo as $item) : ?>
                        
                        <div class="col-lg-4 col-md-4 col-12 mt-2">
                     
                        <div class="card text-center" >
                                    <img class="card-img-top " src="../dashboard/modules/category_two/<?php echo $item['url_imagen1']; ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <i class="fa fa-plane partext2"></i>&nbsp; <i class="fa fa-building-o partext2"></i> &nbsp;<i class="fa fa-cutlery partext2" aria-hidden="true"></i>
                                        <a href="#" class="btn btn-info btn-lg btn-block mt-2 bo">Ver más</a>
                                    </div>
                                </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>

            </div>




            <br> <br>
            <!-- Categoría 2  -->
            <div class="row">
                <div class="col-md-3">
                    <!-- <h1 class="tama mb-4">hola</h1> -->
                </div>
                <div class="col-md-9">
                    <div class="row col-lg-6">

                        <?php

                        include_once '../dashboard/class/CategoriaTres.php';
                        $cate = CategoriaTres::recuperarCategoriasPublicadas();

                        if (count($cate) > 0) :
                        ?>
                            <?php foreach ($cate as $item) : ?>
                                <h1 class="tama mb-4"><?php echo $item['nombre']; ?> </h1>
                            <?php endforeach; ?>

                        <?php endif; ?>
                    </div>

                    <?php
                    include_once '../dashboard/class/DestinosTres.php';
                    $promo = DestinosTres::recuperarPromocionesPublicadas();

                    if (count($promo) > 0) :
                    ?>
                    
                    <div class="row">
                    <div class="card-deck">
                    <?php foreach ($promo as $item) : ?>
                        
                        <div class="col-lg-4 col-md-4 col-12 mt-2">
                     
                        <div class="card text-center" >
                                    <img class="card-img-top " src="../dashboard/modules/category_three/<?php echo $item['url_imagen1']; ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <i class="fa fa-plane partext2"></i>&nbsp; <i class="fa fa-building-o partext2"></i> &nbsp;<i class="fa fa-cutlery partext2" aria-hidden="true"></i>
                                        <a href="#" class="btn btn-info btn-lg btn-block mt-2 bo">Ver más</a>
                                    </div>
                                </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>

            </div>



        </div>


    </section>


    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img src="../img/logo_footer.png" alt="" height="61px">
                                </a>
                            </div>
                            <p>Visitanos en nuestras redes sociales</p>
                            <div class="fa-social">
                                <a href="https://www.facebook.com/HOLIDAYTRAVELOPERADORA" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/HOLIDAYTRAVELOP" target="_blank"><i class="fa fa-twitter"></i></a>
                                <!-- <a href="#"><i class="fa fa-tripadvisor"></i></a> -->
                                <a href="https://www.instagram.com/holidaytraveloperadora" target="_blank"><i class="fa fa-instagram"></i></a>
                                <a href="https://www.youtube.com/channel/UCoWymMXp-HY84Lm5Sr6cweA" target="_blank"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="ft-contact">
                            <h6>Contáctanos</h6>
                            <ul>
                                <li><i class="fa fa-phone icolor"></i>&nbsp; (52) 443-688-9901 </li>
                                <li><i class="fa fa-phone icolor"></i>&nbsp; (52) 417-688-2572 </li>
                                <li><i class="fa fa-phone icolor"></i>&nbsp; (52) 417-688-3468 </li>
                                <li><i class="fa fa-envelope icolor"></i>&nbsp; agencias@holidaytravel.com.mx</li>
                                <li><i class="fa fa-address-book-o icolor"></i>&nbsp; Calle Brasilia # 135, Col. Lomas de las Américas. <br> C.P. 58254. Morelia, Mich.</li>
                                <li>
                                    <div class="logos mt-1">

                                        <a href="#"><img src="./images/one.png" alt=""></a>
                                        <a href="#"><img src="./images/safe.png" alt=""></a>
                                        <a href="#"><img src="./images/cocanaco.png" alt=""></a>
                                        <a href="#"><img src="./images/sectur.png" alt=""></a>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 offset-lg-1">
                        <div class="ft-newslatter">
                            <h6>Suscribetet</h6>
                            <p>Obtenga las áctualizaciones y ofertas</p>
                            <form action="#" class="fn-form">
                                <input type="text" placeholder="Email">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="copyright-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <ul>
                            <!-- <li><a href="#">Terms of use</a></li> -->
                            <li><b><a href="../aviso_privacidad.php" target="_blank">Aviso de privacidad</a></b></li>
                            <!-- <li><a href="#">Environmental Policy</a></li> -->
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <div class="co-text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> Todos los derechos reservados | Holidaytravel
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->


    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="images/publicidad_predial1.jpg" style="width: 100%; height: auto;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div> -->

    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src='http://cdn.mejorcodigo.net/mejor-push/mejor-push.js'></script>
    <script src='http://cdn.mejorcodigo.net/mejor-push/mejor-push-helper.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
    <script src="js/main.js"></script>
    <script src="js/superplaceholder.min.js"></script>
    <script src="js/script.js"></script>
    <!-- <script>
    $( document ).ready(function() {
    $('#exampleModalCenter1').modal('toggle')
});
    </script> -->


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            initPush("db5f9a61-7285-405a-9c27-644938cc9d5b");
        });
    </script>

    <script>
        $(window).scroll(function() {
            // 100 = The point you would like to fade the nav in.

            if ($(window).scrollTop() > 100) {

                $('.fixed').addClass('is-sticky');

            } else {

                $('.fixed').removeClass('is-sticky');

            };
        });
    </script>

    <script>
        $(document).ready(function() {
            $.validator.addMethod("formAlphanumeric", function(value, element) {
                var pattern1 = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
                return this.optional(element) || pattern1.test(value);
            }, "El campo debe tener un valor alfanumérico");


            $("#formulario").validate({

                rules: {

                    busqueda: {
                        required: true,
                        formAlphanumeric: true,
                        maxlength: 30,

                    }

                },

                messages: {

                    busqueda: {
                        required: "Por favor introduzca una palabra",
                        formAlphanumeric: "La busqueda solo puede contener letras",
                        maxlength: "Solo se admite un máximo de 30 caracteres"

                    },

                },

                errorLabelContainer: "#errores"


            });

        });
    </script>
</body>

</html>