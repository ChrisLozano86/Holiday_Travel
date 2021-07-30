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
        
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="index.php">Inicio</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="https://www.facebook.com/HOLIDAYTRAVELOPERADORA" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/HOLIDAYTRAVELOP" target="_blank"><i class="fa fa-twitter"></i></a> 
            <a href="https://www.instagram.com/holidaytraveloperadora" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCoWymMXp-HY84Lm5Sr6cweA" target="_blank"><i class="fa fa-youtube-play"></i></a>
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
                            <li><i class="fa fa-envelope"></i>  agencias@holidaytravel.com.mx</li>
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
                                <img src="img/logo.png" class="img-fluid" alt="" >
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="active"><a href="./index.php">Inicio</a></li>
                                </ul>
                            </nav>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

         

   
    <section>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div style="width: 80%; margin-left:10%;">
                        <h3 class="text-center mb-4 mt-4">Registre su agencia</h3>

                        <p>Los campos con <span class="text text-danger">*</span> son obligatorios.</p>
                        <form action="registro.php" method="post" id="slider_form" enctype="multipart/form-data">


                    <h4 class="section-form">Información</h4>

                    <div class="form-group">
                        <input class="form-control" type="hidden" name="idAgencia" id="idAgencia" value="">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="hidden" name="logo" id="logo" value="">
                    </div>

                    <div class="form-group">
                        <label for="razon_social">Razón Social <span class="text text-danger">*</span></label>
                        <input class="form-control" type="text" name="razon_social" id="razon_social" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="nombre_comercial">Nombre Comercial <span class="text text-danger">*</span></label>
                        <input class="form-control" type="text" name="nombre_comercial" id="nombre_comercial" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="rfc">RFC <span class="text text-danger">*</span></label>
                        <input class="form-control" type="text" name="rfc" id="rfc" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="calle">Calle <span class="text text-danger">*</span></label>
                        <input class="form-control" type="text" name="calle" id="calle" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="num_exterior">Número Exterior <span class="text text-danger">*</span></label>
                        <input class="form-control" style="width: 20%;" type="text" name="num_exterior" id="num_exterior" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="num_interior">Número Interior</label>
                        <input class="form-control" style="width: 20%;" type="text" name="num_interior" id="num_interior" value="">
                    </div>

                    <div class="form-group">
                        <label for="colonia">Colonia <span class="text text-danger">*</span></label>
                        <input class="form-control" type="text" name="colonia" id="colonia" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="municipio">Municipio <span class="text text-danger">*</span></label>
                        <input class="form-control" type="text" name="municipio" id="municipio" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="ciudad">Ciudad <span class="text text-danger">*</span></label>
                        <input class="form-control" type="text" name="ciudad" id="ciudad" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado <span class="text text-danger">*</span></label>
                        <input class="form-control" type="text" name="estado" id="estado" value="" required>
                    </div>


                    <div class="form-group">
                        <label for="cp">Código Postal <span class="text text-danger">*</span></label>
                        <input class="form-control" style="width: 20%;" type="text" name="cp" id="cp" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="pais">País <span class="text text-danger">*</span></label>
                        <select id="pais" name="pais" class="form-control w-100 mb-3" required>
                            <option value=''>Selecciona un país</option>
                            <option value='Antigua y Barbuda'>Antigua y Barbuda</option>
                            <option value='Argentina'>Argentina</option>
                            <option value='Aruba'>Aruba</option>
                            <option value='Bahamas'>Bahamas</option>
                            <option value='Barbados'>Barbados</option>
                            <option value='Belice'>Belice</option>
                            <option value='Bolivia'>Bolivia</option>
                            <option value='Brasil'>Brasil</option>
                            <option value='Caribe'>Caribe</option>
                            <option value='Chile'>Chile</option>
                            <option value='Colombia'>Colombia</option>
                            <option value='Costa Rica'>Costa Rica</option>
                            <option value='Cuba'>Cuba</option>
                            <option value='Dominica'>Dominica</option>
                            <option value='Ecuador'>Ecuador</option>
                            <option value='El Salvador'>El Salvador</option>
                            <option value='Grenada'>Grenada</option>
                            <option value='Guadalupe'>Guadalupe</option>
                            <option value='Guatemala'>Guatemala</option>
                            <option value='Guyana'>Guyana</option>
                            <option value='Guyana Francesa'>Guyana Francesa</option>
                            <option value='Haití'>Haití</option>
                            <option value='Honduras'>Honduras</option>
                            <option value='Islas Caimán'>Islas Caimán</option>
                            <option value='Islas Turcas y Caicos'>Islas Turcas y Caicos</option>
                            <option value='Islas Vírgenes'>Islas Vírgenes</option>
                            <option value='Jamaica'>Jamaica</option>
                            <option value='Martinica'>Martinica</option>
                            <option value='México' selected>México</option>
                            <option value='Nicaragua'>Nicaragua</option>
                            <option value='Panamá'>Panamá</option>
                            <option value='Paraguay'>Paraguay</option>
                            <option value='Perú'>Perú</option>
                            <option value='Puerto Rico'>Puerto Rico</option>
                            <option value='República Dominicana'>República Dominicana</option>
                            <option value='San Bartolomé'>San Bartolomé</option>
                            <option value='San Cristóbal y Nieves'>San Cristóbal y Nieves</option>
                            <option value='San Vicente y las Granadinas'>San Vicente y las Granadinas</option>
                            <option value='Santa Lucía'>Santa Lucía</option>
                            <option value='Suriname'>Suriname</option>
                            <option value='Trinvaluead y Tobago'>Trinvaluead y Tobago</option>
                            <option value='Uruguay'>Uruguay</option>
                            <option value='Venezuela'>Venezuela</option>
                        </select>
                    </div>

                    <div class="form-group ">
                        <label for="moneda">Moneda <span class="text text-danger">*</span></label>
                        <select name="moneda" id="moneda" class="form-control w-100 mb-3" required>
                            <option value=''>Selecciona una moneda</option>
                            <option value='Peso Mexicano' selected>Peso mexicano</option>
                            <option value='Dólar Estadounidense'>Dólar estadounidense</option>
                            <option value='Peso Argentino'>Peso argentino</option>
                            <option value='Dólar de Barbados'> Dólar de Barbados</option>
                            <option value='Dólar Beliceño'> Dólar beliceño</option>
                            <option value='Boliviano'>Boliviano</option>
                            <option value='Real Brasileño'> Real brasileño</option>
                            <option value='Dólar Canadiense'>Dólar canadiense</option>
                            <option value='Peso Chileno'>Peso chileno</option>
                            <option value='Peso Colombiano'>Peso colombiano</option>
                            <option value='Colón Costarricense'> Colón costarricense</option>
                            <option value='Peso Cubano'> Peso cubano</option>
                            <option value='Dólar del Caribe Oriental'> Dólar del Caribe Oriental</option>
                            <option value='Quetzal '> Quetzal </option>
                            <option value='Dolar Guyanés'>Dolar guyanés</option>
                            <option value='Gourde'> Gourde</option>
                            <option value='Lempira'> Lempira</option>
                            <option value='Dólar Jamaicano'> Dólar jamaicano</option>
                            <option value='Córdoba'> Córdoba</option>
                            <option value='Guaraní'> Guaraní</option>
                            <option value='Sol Peruano'> Sol Peruano</option>
                            <option value='Peso Dominicano'> Peso dominicano</option>
                            <option value='Dólar Surinamés'>Dólar surinamés</option>
                            <option value='Dólar Trinitense'> Dólar trinitense</option>
                            <option value='Peso Uruguayo'> Peso uruguayo</option>
                            <option value='Bolívar'> Bolívar</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="telefonos">Teléfonos <span class="text text-danger">*</span></label>
                        <input class="form-control w-50" type="text" name="tel1" id="tel1" value="" placeholder="Número Telefónico 1" required>
                        <input class="form-control w-50 mt-3" type="text" name="tel2" id="tel2" value="" placeholder="Número Telefónico 2">
                        <input class="form-control w-50 mt-3" type="text" name="tel3" id="tel3" value="" placeholder="Número Telefónico 3">
                    </div>

                    <div class="form-group">
                                            <label for="logo">¿Cuenta con Registro Nacional de Turismo(RNT)?  <span class="text text-danger">*</span></label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="rnt"  value="No" onclick="showInp(this)" checked >No
                                                </label>
                                                <label class="form-check-label" style="margin-left: 50px;">
                                                    <input type="radio" class="form-check-input" name="rnt"  value="Si"  onclick="showInp(this)" >Si
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="registro_rnt" id="registro_rnt"  style="display: none" placeholder="Introduzca su número de registro" value="">
                                        </div>
                                        <br>

                   

                    <h4 class="section-form">Configuraciones del sitio web</h4>

                    <div class="form-group">
                        <label for="pagina_web">Página web</label>
                        <input class="form-control" type="text" name="pagina_web" id="pagina_web" value="">
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="hidden" id="activo" name="activo" value="Sí">
                    </div>

                    <div class="form-group">

                        <input class="form-control" type="hidden" name="clave_back_office" id="clave_back_office" value="">
                    </div>

                    <!-- <h4 class="section-form">Configuraciones del sitio web</h4>  -->

                    <div class="form-group">
                        <label for="url_img1">Logo </label>
                        <br><small class="text text-danger"> Si cuenta con el logo de la empresa, puede subir la imagen con dimensiones de 180 x 180 píxeles en formato JPG o PNG</small>


                        <input type="file" class="form-control-file" name="url_img1" id="url_img1" ?>
                    </div>


                    <h4 class="section-form">Datos del contacto</h4>

                    <div class="form-group">
                        <label for="nombre_contacto">Nombre <span class="text text-danger">*</span></label>
                        <input class="form-control" type="text" name="nombre_contacto" id="nombre_contacto" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="apellido_paterno">Apellido Paterno <span class="text text-danger">*</span></label>
                        <input class="form-control" type="text" name="apellido_paterno" id="apellido_paterno" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="apellido_materno">Apellido Materno <span class="text text-danger">*</span></label>
                        <input class="form-control" type="text" name="apellido_materno" id="apellido_materno" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="cargo">Cargo <span class="text text-danger">*</span></label>
                        <input class="form-control" type="text" name="cargo" id="cargo" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="logo">Sexo <span class="text text-danger">*</span></label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sexo" value="M" checked>Masculino
                            </label>
                            <label class="form-check-label" style="margin-left: 50px;">
                                <input type="radio" class="form-check-input" name="sexo" value="F">Femenino
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tel_directo">Teléfono Directo <span class="text text-danger">*</span></label>
                        <input class="form-control" type="text" name="tel_directo" id="tel_directo" value="" required>
                    </div>

                    <div class="form-group">
                        <label for="tel_movil">Teléfono Móvil</label>
                        <input class="form-control" type="text" name="tel_movil" id="tel_movil" value="">
                    </div>

                    <div class="form-group">
                        <label for="email_contacto">Correo Electrónico <span class="text text-danger">*</span></label>
                        <input class="form-control" type="email" name="email_contacto" id="email_contacto" value="" required>
                    </div>

                    <!-- <h4 class="section-form">Dirección para el envío de correos electrónicos</h4>  -->


                    <div class="form-group">
                        <!-- <label for="email_servidor">Correo Electrónico</label> -->
                        <input class="form-control" type="hidden" name="email_servidor" id="email_servidor" value="">
                    </div>

                    <div class="form-group">
                        <!-- <label for="clave">Clave</label> -->
                        <input class="form-control" type="hidden" name="clave" id="clave" value="">
                    </div>

                    <div class="form-group">
                        <!-- <label for="servidor_smtp">Servidor SMTP</label> -->
                        <input class="form-control" type="hidden" name="servidor_smtp" id="servidor_smtp" value="">
                    </div>

                    <div class="form-group">
                        <!-- <label for="smtp">Port SMTP</label> -->
                        <input class="form-control" type="hidden" name="port_smtp" id="port_smtp" value="">
                    </div>



                    <div class="form-group">
                        <input type="submit" class="btn btn-default btn-custom" value="Guardar información">
                    </div>


                    </form>

                    
                    <script>
                                        function showInp(){
                                       
                                        let radio = $('input[name="rnt"]:checked').val()
                                        
                                        if(radio=="Si"){
                                            document.getElementById("registro_rnt").style.display = "inline-block";
                                        }

                                        if(radio=="No"){
                                            document.getElementById("registro_rnt").style.display = "none";
                                        }

                                    
                                    }
                                    
                                    </script>

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
                            <li><a href="#">Aviso de privacidad</a></li>
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