<?php
session_start();

 if (!isset($_POST['busqueda'])) {
 	header("Location: index.php");
 }


include_once '../dashboard/class/Circuito.php';

// require_once 'admin/class/Categoria.php';
// $categoria = Categoria::getRandom();
// $categorias = Categoria::recuperarTodos();

// $idAnuncio = (isset($_REQUEST['idAnuncio'])) ? $_REQUEST['idAnuncio'] : null;

// if ($idAnuncio) {
// 	$anuncioBuscado = Anuncio::buscarPorId($idAnuncio);
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$search = (isset($_POST['busqueda'])) ? $_POST['busqueda'] : null;
}

$search_original = $search;
$busqueda = Circuito::busqueda($search);
$total = count($busqueda);

$articulosPagina = 10;
$paginas = ceil($total / $articulosPagina);
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
	<title>Resultados | Busqueda</title>
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
					<a class="text-white" href="index.php">HolidayTravel</a>
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

	<!-- start banner Area -->
	<section class="banner-area relative" id="home">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row search-page-top d-flex align-items-center justify-content-center">
				<div class="banner-content col-lg-12">
					<img src="images/1.png"  height="65px" class="" alt="">
					<h1 class="text-blacki" style="font-size: calc(1em + 1vw);">

						Resultados de búsqueda
					</h1>

					<form action="search.php" method="POST" class="serach-form-area" id="formulario">
						<div class="row justify-content-center form-wrap">
							<div class="col-lg-10 form-cols">
								<input type="text" class="form-control" name="busqueda" value="<?php echo $search_original ?>">

							</div>


							<!-- 	<div class="col-lg-5 form-cols">
										<input id="cate" type="text" class="form-control" name="categorias" placeholder = "Escriba el nombre de una categoría" >
									</div> -->


							<div class="col-lg-2 form-cols">
								<button type="submit" class="btn btn-info">
									<span class="lnr lnr-magnifier"></span> Buscar
								</button>
							</div>
						</div>
						<div id="errores"></div>
					</form>


				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start post Area -->
	<section class="post-area section-gap">


		<div class="container ">
		


		<?php if ($total > 0) : ?>
				<?php

				if ($total == 1) {
					echo '<p class="text-black"><span class="text-orange">' .  $total . '</span> resultado encontrado para <span class="text-orange">' . $search_original . '</span></p>';
				} else {
					echo '<p class="text-black"><span class="text-orange">' .  $total . '</span> resultados encontrados para <span class="text-orange">' . $search_original . '</span></p>';
				}


				?>

				<div class="row justify-content-center d-flex">

					<div class="col-lg-10 post-list">
						<table class="table" id="table-data" style="border:none;">
							<thead>
								<tr>
									<th>Resultados</th>
								</tr>

							</thead>
							<tbody>
							<?php foreach ($busqueda as $item) : ?>
									<tr>
										<td>
											<div class="single-post d-flex flex-row">

												<div class="thumb">
													<a href="./details.php?idCircuito=<?php echo $item[0];?>"><img src="../dashboard/modules/circuits/<?php echo $item['url_imagen1']; ?>" alt="" width="70" height="70" class="rounded-circle mx-auto d-block"></a>
												</div>

												<div class="marle">
													<div class="details">
														<div class="title d-flex flex-row justify-content-between">
															<div class="titles">
																<a href="./details.php?idCircuito=<?php echo $item[0];?>" >
																	<h4><?php echo $item['titulo']; ?></h4>
																	<div class="starts">
															<ul class="list-unstyled list-inline rating mb-0">
																<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"> </i></li>
																<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
																<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
																<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
																<li class="list-inline-item"><i class="fas fa-star amber-text"></i></li>
																<li class="list-inline-item">
																	<p class="text-muted">5.0 (333)</p>
																</li>
															</ul>
														</div>
																	<p><?php echo $item['descripcion']; ?></p>
																</a>
															</div>
														</div>



											
<!-- 
														<div class="closed-ca ti-home">.&nbsp;&nbsp;
															<span class="closed-wa ">

														
															</span>
															&nbsp;&nbsp; <span class="closed-mun"> </span>
															<span class="closed-cat">
														
															</span>
														</div> -->




														<!-- <div class="closed-now">Ver Información</div> -->


													</div>



												</div>

											</div>

											<!-- Modal -->

											<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">





												<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="text-center modal-title" id="exampleModalCenterTitle" style="font-size: calc(0.5em + 1vw);">?>
														
														</h5>
													
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>

														<div class="modal-body">

															<nav>
																<div class="nav nav-tabs" id="nav-tab" role="tablist">
																	<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="" role="tab" aria-controls="nav-home" aria-selected="true">Información</a>
																	<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="" role="tab" aria-controls="nav-profile" aria-selected="false">Encuentranos</a>
																	<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="" role="tab" aria-controls="nav-contact" aria-selected="false">Galería</a>
																</div>
															</nav>
															<div class="tab-content" id="nav-tabContent">
																<div class="tab-pane fade show active" id="" role="tabpanel" aria-labelledby="nav-home-tab">
																	<br>
																	<div>
																		<img src="" alt="" class="img-fluid d-block m-auto img-anuncio" style="width: 60%; height:auto;">
																	</div>
																	<div>
																		
																		<h4 class="gris">General</h4>
																		<hr>
																		<div class="starts mb-2">
																			<ul class="list-unstyled list-inline rating mb-0">
																				<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"> </i></li>
																				<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
																				<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
																				<li class="list-inline-item mr-0"><i class="fas fa-star amber-text"></i></li>
																				<li class="list-inline-item"><i class="fas fa-star amber-text"></i></li>
																				<li class="list-inline-item">
																					<p class="text-muted">5.0 (333)</p>
																				</li>
																			</ul>
																		</div>
																	
																		<div class="">
																			
																		</div>
																	
																		<div class="mt-2">
																			<h6>&#x260e; <span class="tele"><?php
																			
																			$tel = $item['telefono'];

																			$posiUno = substr($tel, 0, 3);
																			$posiDos = substr($tel, 3, 3);
																			$posiTres = substr($tel, 6, 4);
																			echo $posiUno . "-" . $posiDos . "-" . $posiTres;
																			
																			
																			?></span></h6>
																		</div>
																		<br>
																		<div><p><?php echo $item[16] ?></p></div>
																		<br>
																		<h4 class="gris">Horario</h4>
																		<hr>

																		<div class="closed-now2">ABIERTO AHORA</div><br>
																		<h6 class="fa fa-clock-o">&nbsp;<span class="model">&nbsp;<?php echo $item['entrada'] ?> - <?php echo $item['cierre'] ?></span></h6>
																		
																		
																		<br><br>
																		<h4 class="gris">Información de Contacto</h4>
																		<hr>

															

																		<div class="text-center">


																			<?php if (!empty($item['facebook'])) : ?>
																				<a href="<?php echo $item['facebook'] ?>" target="_blank"><img src="images/face.png" width="50px" height="50px"></a>
																			<?php endif; ?>

																			<?php if (!empty($item['telefono'])) : ?>
																				<a href="https://api.whatsapp.com/send?phone=52<?php echo $item['telefono'] ?>" target="_blank"><img src="images/what.png" width="50px" height="50px"></a>
																			<?php endif; ?>

																			<?php if (!empty($item['instagram'])) : ?>
																				<a href="<?php echo $item['instagram'] ?>" target="_blank"><img src="images/insta.png" width="50px" height="50px"></a>
																			<?php endif; ?>
																			
																		</div>



																	</div>
																</div>


																<div class="tab-pane fade" id="nav-profile<?php echo $item[0]; ?>" role="tabpanel" aria-labelledby="nav-profile-tab">
																	<br>
																	<?php if ($item['google_maps'] != "") {
																	?>
																		<iframe src="<?php echo $item['google_maps'] ?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
																	<?php
																	} else {
																		echo '<p><small class="alert alert-info">Aún no se ha registrado una ubicación en Google Maps para este negocio</small></p>';
																	}
																	?>

																</div>

																<div class="tab-pane fade" id="nav-contact<?php echo $item[0]; ?>" role="tabpanel" aria-labelledby="nav-contact-tab">
																	<div class="single-post d-flex flex-row">

																		<!-- <div class="thumb">
																			<img src="admin/modules/posts/?>" alt="" width="70" height="70" class="rounded-circle">
																		</div> -->

																		<div class="details">
																			<div class="title d-flex flex-row justify-content-between">
																				<div class="titles">
																					<br>
																					<h4></h4>

																				</div>
																			</div>

																			<div class="closed-ca"> </div>

																		</div>



																	</div>

																</div>
															</div>
														</div>


														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

														</div>
													</div>
												</div>
											</div>


										</td>



										
									</tr>

									<?php endforeach; ?>			
			
							
							</tbody>
						</table>

						<?php else : ?>
				

						<div class="container">
							<div class="row justify-content-center d-flex">
								<div class="col-lg-10 post-list">
				

								<div class="single-post d-flex flex-row">
										<div class="thumb">
											<img src="search/img/post.png" alt="" width="150" height="80" class="img-fluid">
											<ul class="tags">

											</ul>
										</div>
										<div class="details">
											<div class="title d-flex flex-row justify-content-between">
												<div class="titles">
													<a href="#">
														<h4>Ups!! No hemos encontrado resultados para "<?php echo $search_original ?>" </h4>
													</a>

												</div>
												<ul class="btns">
													<!-- <li><a href="#"><span class="lnr lnr-heart"></span></a></li> -->

												</ul>
											</div>



										</div>
									</div>

									<?php endif; ?>


				
							</div>
						
						</div>
						</div>
	</section>
	<!-- End post Area -->



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
                                       
                                        <a href="#"><img src="./images/one.png" alt="" ></a>
                                        <a href="#"><img src="./images/safe.png" alt="" ></a>
                                        <a href="#"><img src="./images/cocanaco.png" alt="" ></a>
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