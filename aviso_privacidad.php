<?php
include_once('lib/registrar_agencia.php');
?>
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
    <link rel="shortcut icon" href="img/favicon.png">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="./dashboard/assets/css/style.css" type="text/css">
    <!-- <link rel="stylesheet" href="./dashboard/assets/css/adminlte.css" type="text/css"> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon  search-switch">
            <!-- <i class="icon_search"></i> -->
        </div>
        <div class="header-configure-area">
            <!-- <div class="language-option">
                <img src="img/flag.jpg" alt="">
                <span>EN <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">Zi</a></li>
                        <li><a href="#">Fr</a></li>
                    </ul>
                </div>
            </div> -->
            <!-- <a href="#" class="bk-btn">Booking Now</a> -->
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Inicio</a></li>
                <li><a href="./index.php#servicios">Servicios</a></li>
                <li><a href="./index.php#promociones">Promociones</a></li>
                <!-- <li><a href="#d" data-toggle="modal" data-target="#exampleModal">Registrate</a></li> -->
                <li><a href="#d">Internacional</a>
                    <ul class="dropdown">
                        <li><a href="#d">Circuitos</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <!-- <a href="#"><i class="fa fa-twitter"></i></a> -->
            <a href="#"><i class="fa fa-tripadvisor"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> (52) 443-688-9901</li>
            <li><i class="fa fa-envelope"></i> agencias@holidaytravel.com.mx</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i> (52) 443-688-9901 </li>
                            <li><i class="fa fa-envelope"></i> agencias@holidaytravel.com.mx</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                            <div class="top-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                            <!-- <a href="#" class="bk-btn">Booking Now</a>
                            <div class="language-option">
                                <img src="img/flag.jpg" alt="">
                                <span>EN <i class="fa fa-angle-down"></i></span>
                                <div class="flag-dropdown">
                                    <ul>
                                        <li><a href="#">Zi</a></li>
                                        <li><a href="#">Fr</a></li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="img/logo.png" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="active"><a href="./index.php">Inicio</a></li>
                                    <li><a href="./index.php#servicios">Servicios</a></li>
                                    <li><a href="./index.php#promociones">Promociones</a></li>
                                    <!-- <li><a href="./index.php#exampleModal" data-toggle="modal" data-target="#exampleModal">Registrate</a></li> -->
                                    <li><a href="#s">Internacional</a>
                                        <ul class="dropdown">
                                            <li><a href="#s">Circuitos</a></li>
                                        </ul>
                                    </li>

                                    <!-- <li><a href="./blog.html">News</a></li>
                                    <li><a href="./contact.html">Contact</a></li> -->
                                </ul>
                            </nav>
                            <div class="nav-right">
                                <form class="form-inline my-2 my-lg-0">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar aquí" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->


    <!-- Services Section End -->
    <section class="services-section spad" id="servicios">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">

                        <h3>Aviso de privacidad</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="service-item">
                        <p class="text-justify">De conformidad con lo establecido en la Ley Federal de protección de datos personales en posesión de los particulares,
                            <b>HOLIDAY TRAVEL OPERADORA MAYORISTA S.A DE C.V.</b> pone a su disposición el siguiente aviso de privacidad. <br><br>
                            <b> HOLIDAY TRAVEL OPERADORA S.A DE C.V.</b>, es responsable del uso y protección de sus datos personales, en este sentido y atendiendo las obligaciones
                            legales establecidas en la Ley Federal de protección de datos personales en posesión de los particulares, a través de este instrumento se informa a los titulares
                            de los datos, la información que de ellos se recaba y los fines que se darán a dicha información <br><br>
                            Además de lo anterior, informamos a usted que HOLIDAY TRAVEL OPERADORA S.A de C.V. tiene su domicilio ubicado en:
                        </p>
                        <p class="text-center"><i>CALLE BRASILIA 135, COLONIA LOMAS DE LAS AMÉRICAS, MORELIA, MICHOACÁN. C.P. 58254</i></p>
                        <p class="text-justify">Los datos personales que recabamos de usted serán utilizados para las siguientes finalidades,
                            las cuales son necesarias para completar nuestra relación con usted, así como para atender los servicios y/o pedidos que solicite. </p>
                        <p class="text-justify">Los datos recabados son únicamente para el uso informativo en los titulares de reservaciones su agencia de viajes de preferencia procede a capturarlos en nuestros sistemas
                            y nosotros. Como operador mayorista los usamos de manera informativa para el proceso de la misma reserva</p>
                        <p class="text-justify">Para llevar a cabo las finalidades descritas en el presente aviso de privacidad, utilizaremos los siguientes datos personales:
                            Nombre y nombre de los acompañantes en su reservación.
                            Por otra parte, informamos a usted, que sus datos personales serán compartidos con las siguientes autoridades, empresas organizaciones o personas distintas a nosotros:
                        </p>
                        <p class="text-justify">Los datos son compartidos por el prestador de servicio final, cómo puede ser Hoteles, Aerolíneas, Navieras, Arrendadoras de autos prestadores de servicios turísticos entre otros.

                            Su información será compartida exclusivamente para los fines que a continuación se mencionan:

                            La información personal compartida con un tercero es únicamente con la finalidad informativa de quién o quiénes son las personas a las que se les deberá dar acceso a las instalaciones, transportes y actividades turísticas a las que hayan realizado su pago.
                        </p>
                        <p class="text-justify">Usted tiene en todo momento el derecho a conocerte datos personales tenemos de usted, para que los utilizamos y las condiciones del uso que les damos (Acceso). Así mismo, es su derecho solicitar la corrección de su información personal en caso de que esté desactualizada, sea inexacta o incompleta (Rectificación); de igual manera, tiene derecho a que su información se elimine de nuestros registros o bases de datos cuando considere que la misma no está siendo utilizada adecuadamente (Cancelación); así como también a oponerse al uso de sus datos personales para fines específicos (Oposición). Estos derechos se conocen como derechos ARCO.

                            Para el ejercicio de cualquiera de los derechos ARCO se deberá presentar la solicitud respectiva por escrito, mediante el envío de una carta o solicitud en formato libre a la siguiente dirección:
                        </p>
                        <p class="text-center"><i>AVENIDA PRIMERA DE MAYO 196 ALTOS COLONIA CENTRO, ACÁMBARO, GUANAJUATO MÉXICO 38600</i></p>

                        <p class="text-justify">Lo anterior también servirá para conocer el procedimiento y requisitos para el ejercicio de los derechos, ARCO, no obstante, debe contener la siguiente información:
                            <br><br>Nombre <br>Dirección <br>e-mail <br>Teléfono <br>Motivo <br> <br>En todo caso la respuesta a la solicitud se darán el siguiente plazo: 15 días hábiles de haberse recibido y deberá ser enviada por correo certificado.
                            Los datos de contacto de la persona o departamento de datos personales, que está a cargo de dar trámite a la solicitud derechos ARCO, son los siguientes: <br><br>
                            a) Nombre del responsable departamento de quejas y administrativo <br>
                            b) Domicilio: Avenida primera de mayo 196 altos Colonia Centro Acámbaro Guanajuato México <br>
                            c) Teléfono 417 688 2572 <br>
                            d) Correo electrónico: direccióngeneral@holidaytravel.com.mx

                        </p>



                        <p class="text-justify">Cabe mencionar, que en cualquier momento usted puede revocar su consentimiento para el uso de sus datos personales. Del mismo modo, usted puede revocar el consentimiento que, en su caso, nos haya otorgado para el tratamiento de sus datos personales.
                            Así mismo, usted deberá considerar que para ciertos fines la revocación de su consentimiento implicará que no podamos seguir prestando el servicio que nos solicitó, o la conclusión de su relación con nosotros.
                            Para revocar el consentimiento que usted otorga en este acto o para limitar su divulgación, se deberá presentar la solicitud respectiva a través de la siguiente dirección electrónica: <br>


                        </p>
                        <p class="text-center"> <b>www.holidaytravel.com.mx </b></p>
                        <p class="text-justify">Del mismo modo, podrá solicitar la información para conocer el procedimiento y requisitos para la revocación del consentimiento, así como limitar el uso y divulgación de su información personal.
                            La respuesta a la solicitud de revocación o limitación de divulgación de sus datos serán más tardar en el siguiente plazo: 15 días hábiles, y se comunicará de la siguiente forma:
                            A través de una carta personal que se le hará llegar con correo certificado y/o si se solicita será vía email
                            De cambios en nuestro modelo de negocios, o por otras causas, por lo cual nos comprometemos a mantenerlo informado sobre los cambios que puede sufrir el presente aviso de privacidad, sin embargo, usted puede solicitar información sobre sí el mismo ha sufrido algún cambio a través de la siguiente dirección electrónica:
                        </p>
                        <p class="text-center"> <b>www.holidaytravel.com.mx </b></p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </section>

    iv>

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img src="img/logo.png" alt="" height="61px">
                                </a>
                            </div>
                            <p>Visitanos en nuestras redes sociales</p>
                            <div class="fa-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-1">
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
                                       
                                        <a href="#"><img src="img/one.png" alt=""></a>
                                        <a href="#"><img src="img/safe.png" alt="" height="70px"></a>
                                        <a href="#"><img src="img/sectur.png" alt=""></a>
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
                            <li><a href="aviso_privacidad.php">Aviso de privacidad</a></li>
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

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>