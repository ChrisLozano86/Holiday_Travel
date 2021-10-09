<?php
session_start();
if (!isset($_GET['idCircuito'])) {
	header("Location: index.php");
}


require_once '../dashboard/class/Circuito.php';



    $idSlider = (isset($_REQUEST['idCircuito'])) ? $_REQUEST['idCircuito'] : null;
    //$edit= isset($_GET['edit']) ? $_GET['edit'] : false;

    if($idSlider){        
        $circuito = Circuito::buscarPorId($idSlider); 
	
    }

    // //Request
    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
    //     $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null;
     
    //     $categoria->setNombre($nombre);
    //     $categoria->setDescripcion($descripcion);
       
    //     $categoria->guardar();
    //     header('Location: index.php');
        
    // }
//include_once '../../assets/template/header.php';




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
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Author Meta -->
	<meta name="author" content="HolidayTravel">
	<!-- Meta Keyword -->
	<meta name="keywords" content="HolidayTravel, Turismo">
	<!-- Meta Description -->
	<meta name="description" content="Turismo, viajes">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!--Icon-->
	<link rel="shortcut icon" href="images/favicon.png">
	<!-- Site Title -->
	<title>Detalles Circuito | htop</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!--CSS============================================= -->
	<link rel="stylesheet" href="search/css/linearicons.css">
	<link rel="stylesheet" href="search/css/font-awesome.min.css">
	<link rel="stylesheet" href="search/css/bootstrap.css">
	<link rel="stylesheet" href="search/css/magnific-popup.css">
	<link rel="stylesheet" href="search/css/nice-select.css">
	<link rel="stylesheet" href="search/css/animate.min.css">
	<link rel="stylesheet" href="search/css/owl.carousel.css">
	<link rel="stylesheet" href="search/css/main.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
</head>

<body>
	<div class="loader"></div>

	<header id="header" id="home">
		<div class="container">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<img src="images/favicon.png" alt="" height="34px">
					<a class="text-white" href="./index.php">HolidayTravel</a>
				</div>

				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li><a href="./index.php">Inicio</a></li>
						<li><a href="../index.php#servicios" target="_blank">Servicios</a></li>
						<li><a href="../index.php#promociones"  target="_blank">Promociones</a></li>
						<li><a href="../index.php#exampleModal"  target="_blank">Registrate</a></li>
						<!-- <li><a href="aviso-privacidad.php">Internacional</a></li> -->
					</ul>
				</nav><!-- #nav-menu-container -->
			</div>
		</div>

	</header><!-- #header -->



	<!-- Start post Area -->
	<br><br><br>


	<div class="container  ">

		<!-- Slider -->
		<div class="row mar">
			<div class="col-12 ">
				<div>
					<h1 class="tamas mb-2"><?php echo $circuito->getTitulo(); ?></h1>
				</div>

				<div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<?php
            
            		//$slider = Circuito::recuperarPublicados();
		

            //if (count($slider) > 0) : 
            ?>
			<?php //foreach ($slider as $item) : ?>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="d-block w-100 " src="../dashboard/modules/circuits/<?php echo $circuito->getImgUno(); ?>" alt="First slide">
						</div>
						<div class="carousel-item">
							<img class="d-block w-100 " src="../dashboard/modules/circuits/<?php echo $circuito->getImgDos(); ?>">
						</div>
						<?php //endforeach; ?>
						<?php //else : ?>
        
    <?php //endif; ?>
						<div class="carousel-item">
						<iframe src="<?php echo $circuito->getVideo() ?>" title="YouTube video player" width="100%" height="534" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<!-- Fin slider -->


			<!-- Social Media -->
			<div class="col-12 col-sm-12 col-md-12 mt-2 ">
				<div class="social">
					<button type="button" class="btn btn-info btn-sm" style="width: 100px;"><i class="fa fa-file-pdf-o"></i>&nbsp;&nbsp;PDF</button>
					<a href="https://www.facebook.com/HOLIDAYTRAVELOPERADORA" target="_blank"><button type="button" class="btn btn-primary btn-sm" style="background-color: rgb(59, 89, 152);"><i class="fa fa-facebook"></i>&nbsp;&nbsp;Facebook</button></a>
					<button type="button"  class="btn btn-success btn-sm"><i class="fa fa-whatsapp"></i>&nbsp;&nbsp;Whatsapp</button>
					<a href="https://www.youtube.com/channel/UCoWymMXp-HY84Lm5Sr6cweA" target="_blank"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-youtube-play"></i>&nbsp;&nbsp;Youtube</button></a>

				</div>

			</div>

			<!-- End Social Media -->

			<br>
			<!-- Paises a visitar -->
			<div class="col-12 mt-5 ">

				<div class="row">
					<div class="col-6">
						<h4 class="pai">PAÍSES QUE SE VISITAN :</h4>
						<p class="parr text-justify"><i class="fa fa-globe" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $circuito->getPaises(); ?></p>

					</div>

					<div class="col-6">
						<h4 class="pai">CIUDADES QUE SE VISITAN :</h4>
						<p class="parr"><i class="fa fa-flag" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $circuito->getCiudades(); ?></p>

					</div>

				</div>


			</div>
			<!-- End Paises a visitar -->

			<hr class="lihr">


			<br>
			<!-- Incluye -->
			<div class="col-12 mt-2 ">

				<div class="row">
					<div class="col-6">
						<h4 class="pai inclu"><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;&nbsp;El viaje incluye :</h4>
						<p class="parr text-justify"><?php echo $circuito->getIncluye(); ?></p>

					</div>

					<div class="col-6">
						<h4 class="pai inclu"><i class="fa fa-times-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;El viaje no incluye :</h4>
						<p class="parr text-justify"><?php echo $circuito->getNoIncluye(); ?></p>

					</div>

				</div>


			</div>
			<!-- End Incluye -->

			<hr class="lihr">



			<br>
			<!-- Itinerario -->
			<div class="col-12 mt-2 ">

				<div class="row">
					<div class="col-12">
						<h4 class="pai inclu"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;&nbsp;Itinerario :</h4>
						<div class="parr text-justify"><?php echo $circuito->getItinerario(); ?></div>

					</div>



				</div>


			</div>
			<!-- End Itinerario -->

			<hr class="lihr">



			<br>
			<!-- Tarifas -->
			<div class="col-12 mt-2 ">

				<div class="row">
					<div class="col-12">
						<h4 class="pai inclu"><i class="fa fa-money" aria-hidden="true"></i>&nbsp;&nbsp;Tarifas :</h4>
						<p class="parr text-justify"><?php echo $circuito->getTarifas() ?></p>
						


					</div>



				</div>


			</div>
			<!-- End Tarifas -->



			<hr class="lihr">



			<br>
			<!-- Hoteles -->
			<div class="col-12 mt-2 ">

				<div class="row">
					<div class="col-12">
						<h4 class="pai inclu"><i class="fa fa-building" aria-hidden="true"></i>&nbsp;&nbsp;Hoteles :</h4>
						<p class="parr text-justify"><?php echo $circuito->getHoteles() ?></p>



					</div>



				</div>


			</div>
			<!-- End Hoteles -->



			<hr class="lihr">



			<br>
			<!-- Mapa -->
			<div class="col-12 mt-2 ">

				<div class="row">
					<div class="col-12">
						<h4 class="pai inclu"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;Mapa :</h4>
						<iframe src="<?php echo $circuito->getMapa() ?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
				</div>
			</div>
			<!-- End Mapa -->



			<hr class="lihr">



			<br>
			<!-- Tours Opcionales -->
			<div class="col-12 mt-2 ">

				<div class="row">
					<div class="col-12">
						<h4 class="pai inclu"><i class="fa fa-subway" aria-hidden="true"></i>&nbsp;&nbsp;Tours Opcionales :</h4>
						<div class="parr text-justify"><?php echo $circuito->getTours() ?></div>

					</div>



				</div>


			</div>
			<!-- End Tours Opcionales -->



			<hr class="lihr">



			<br>
			<!-- Visas -->
			<div class="col-12 mt-2 ">

				<div class="row">
					<div class="col-12">
						<h4 class="pai inclu"><i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp;&nbsp;Visas :</h4>
						<div class="parr text-justify"><?php echo $circuito->getVisas() ?></div>



					</div>



				</div>


			</div>
			<!-- End Visas -->


		</div>
	</div>


	<!-- End post Area -->


	<br><br><br>

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
	< <script src="search/js/vendor/jquery-2.2.4.min.js">
		</script>
		<script src="https://code.jquery.com/jquery-2.1.3.min.js" integrity="sha256-ivk71nXhz9nsyFDoYoGf2sbjrR9ddh+XDkCcfZxjvcM=" crossorigin="anonymous"></script>





		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


		<script src="search/js/vendor/bootstrap.min.js"></script>
		<script src="search/js/easing.min.js"></script>
		<script src="search/js/hoverIntent.js"></script>
		<script src="search/js/superfish.min.js"></script>
		<script src="search/js/jquery.ajaxchimp.min.js"></script>
		<script src="search/js/jquery.magnific-popup.min.js"></script>
		<script src="search/js/owl.carousel.min.js"></script>
		<script src="search/js/jquery.sticky.js"></script>
		<script src="search/js/jquery.nice-select.min.js"></script>
		<script src="search/js/parallax.min.js"></script>
		<script src="search/js/mail-script.js"></script>
		<script src="search/js/main.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
		<script src="js/data.js"></script>

		<script type="text/javascript">
			$(window).load(function() {
				$(".loader").fadeOut("slow");
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