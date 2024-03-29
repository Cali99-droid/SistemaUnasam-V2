<?php //debuguear($beneficios);

use Carbon\Carbon;


?>

<!DOCTYPE html>
<html lang="es">

<head>

	<title>Hydro - Landing Page Template</title>
	<!-- 
Hydro Template 
http://www.templatemo.com/tm-509-hydro
-->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="/../build/css/landing/bootstrap.min.css">
	<link rel="stylesheet" href="/../build/css/landing/magnific-popup.css">
	<link rel="stylesheet" href="/../build/css/landing/font-awesome.min.css">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="/../build/css/landing/templatemo-style.css">
</head>

<body>

	<!-- PRE LOADER -->
	<section class="preloader">
		<div class="spinner">
			<span class="spinner-rotate"></span>
		</div>
	</section>


	<!-- MENU -->
	<section class="navbar custom-navbar navbar-fixed-top" role="navigation">
		<div class="container">

			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
				</button>

				<!-- lOGO TEXT HERE -->
				<a href="/" class="navbar-brand">UNASAM</a>
			</div>

			<!-- MENU LINKS -->
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-nav-first">
					<li><a href="#home" class="smoothScroll">Inicio</a></li>
					<li><a href="#blog" class="smoothScroll">Beneficios</a></li>
					<li><a href="#work" class="smoothScroll">Organizaciones</a></li>
					<li><a href="#about" class="smoothScroll">Sobre Nosotros</a></li>

					<li><a href="#contact" class="smoothScroll">Contacto</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					<li class="section-btn"><a href="/login">Iniciar Sesión</a></li>
				</ul>
			</div>

		</div>
	</section>


	<!-- HOME -->
	<section id="home" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">

				<div class="col-md-6 col-sm-12">
					<div class="home-info">
						<h1>Lorem Ipsum is simply dummy </h1>
						<a href="#about" class="btn section-btn smoothScroll">Visitanos</a>

					</div>
				</div>

				<div class="col-md-6 col-sm-12">
					<div class="home-video">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/QFz1mTwz3jc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>


	<!-- ABOUT -->
	<section id="about" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">

				<div class="col-md-5 col-sm-6">
					<div class="about-info">
						<div class="section-title">
							<h2>Let us introduce</h2>
							<span class="line-bar">...</span>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="about-info skill-thumb">

						<strong>Web Design</strong>
						<span class="pull-right">85%</span>
						<div class="progress">
							<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
						</div>

						<strong>Photography</strong>
						<span class="pull-right">90%</span>
						<div class="progress">
							<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
						</div>

						<strong>Content Marketing</strong>
						<span class="pull-right">75%</span>
						<div class="progress">
							<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
						</div>

						<strong>CMS Admin</strong>
						<span class="pull-right">70%</span>
						<div class="progress">
							<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
						</div>

					</div>
				</div>

				<div class="col-md-4 col-sm-12">
					<div class="about-image">
						<img src="images/about-image.jpg" class="img-responsive" alt="">
					</div>
				</div>

			</div>
		</div>
	</section>


	<!-- BLOG -->
	<section id="blog" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">

				<div class="col-md-12 col-sm-12">
					<div class="section-title">
						<h2>Beneficios</h2>
						<span class="line-bar">...</span>
					</div>
				</div>
				<?php foreach ($beneficios as $beneficio) {
				?>
					<div class="col-md-6 col-sm-6">
						<!-- BLOG THUMB -->
						<div class="media blog-thumb">
							<div class="media-object media-left">
								<a href="blog-detail.html">
									<img src="/imagenes/<?php //echo $grupo->imagen 
														?>" class="img-responsive " alt=""></a>
							</div>
							<div class="media-body blog-info">
								<small><i class="fa fa-clock-o"></i> <?php
																		?></small>
								<h3><a href="blog-detail.html"><?php echo $beneficio->nombre
																?></a></h3>
								<p>Lorem ipsum dolor sit consectetur adipiscing morbi venenatis.</p>
								<a href="blog-detail.html" class="btn section-btn">Read article</a>
							</div>
						</div>
					</div>
				<?php  } ?>





			</div>
		</div>
	</section>


	<!-- WORK -->
	<section id="work" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">

				<div class="col-md-12 col-sm-12">
					<div class="section-title">
						<h2>Organizaciones Estudiantiles</h2>
						<span class="line-bar">...</span>
					</div>
				</div>
				<?php foreach ($grupos as $grupo) { ?>
					<div class="col-md-3 col-sm-6">
						<!-- WORK THUMB -->

						<div class="work-thumb">
							<a href="/imagenes/<?php echo $grupo->imagen ?>" class="image-popup">
								<img src="/imagenes/<?php echo $grupo->imagen ?>" class="img-responsive" alt="Work">

								<div class="work-info">
									<h3><?php echo $grupo->nombre ?></h3>
									<small>
										<?php
										$fecha = new Carbon($grupo->fecha_creacion);
										echo 'Creado ' . $fecha->diffForHumans();  ?>
									</small>
								</div>

							</a>

						</div>
						<!-- <a href="/organizacion?id=" class="section-btn">Ver mas</a> -->
					</div>

				<?php }; ?>




			</div>
		</div>
	</section>

	<!-- CONTACT -->
	<section id="contact" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">

				<div class="col-md-12 col-sm-12">
					<div class="section-title">
						<h2>Contact us</h2>
						<span class="line-bar">...</span>
					</div>
				</div>

				<div class="col-md-8 col-sm-8">

					<!-- CONTACT FORM HERE -->
					<form id="contact-form" role="form" action="#" method="post">
						<div class="col-md-6 col-sm-6">
							<input type="text" class="form-control" placeholder="Full Name" id="cf-name" name="cf-name" required="">
						</div>

						<div class="col-md-6 col-sm-6">
							<input type="email" class="form-control" placeholder="Your Email" id="cf-email" name="cf-email" required="">
						</div>

						<div class="col-md-6 col-sm-6">
							<input type="tel" class="form-control" placeholder="Your Phone" id="cf-number" name="cf-number" required="">
						</div>

						<div class="col-md-6 col-sm-6">
							<select class="form-control" id="cf-budgets" name="cf-budgets">
								<option>Budget Level</option>
								<option>$500 to $1,000</option>
								<option>$1,000 to $2,200</option>
								<option>$2,200 to $4,500</option>
								<option>$4,500 to $7,500</option>
								<option>$7,500 to $12,000</option>
								<option>$12,000 or more</option>
							</select>
						</div>

						<div class="col-md-12 col-sm-12">
							<textarea class="form-control" rows="6" placeholder="Your requirements" id="cf-message" name="cf-message" required=""></textarea>
						</div>

						<div class="col-md-4 col-sm-12">
							<input type="submit" class="form-control" name="submit" value="Send Message">
						</div>

					</form>
				</div>

				<div class="col-md-4 col-sm-4">
					<div class="google-map">
						<!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3647.3030413476204!2d100.5641230193719!3d13.757206847615207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf51ce6427b7918fc!2sG+Tower!5e0!3m2!1sen!2sth!4v1510722015945" allowfullscreen></iframe>
					</div>
				</div>

			</div>
		</div>
	</section>


	<!-- FOOTER -->
	<footer data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">

				<div class="col-md-5 col-sm-12">
					<div class="footer-thumb footer-info">
						<h2>Hydro Company</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
				</div>

				<div class="col-md-2 col-sm-4">
					<div class="footer-thumb">
						<h2>Company</h2>
						<ul class="footer-link">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Join our team</a></li>
							<li><a href="#">Read Blog</a></li>
							<li><a href="#">Press</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-2 col-sm-4">
					<div class="footer-thumb">
						<h2>Services</h2>
						<ul class="footer-link">
							<li><a href="#">Pricing</a></li>
							<li><a href="#">Documentation</a></li>
							<li><a href="#">Support</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-sm-4">
					<div class="footer-thumb">
						<h2>Find us</h2>
						<p>123 Grand Rama IX, <br> Krung Thep Maha Nakhon 10400</p>
					</div>
				</div>

				<div class="col-md-12 col-sm-12">
					<div class="footer-bottom">
						<div class="col-md-6 col-sm-5">
							<div class="copyright-text">
								<p>Copyright &copy; 2017 Your Company</p>
							</div>
						</div>
						<div class="col-md-6 col-sm-7">
							<div class="phone-contact">
								<p>Call us <span>(+66) 010-020-0340</span></p>
							</div>
							<ul class="social-icon">
								<li><a href="https://www.facebook.com/templatemo" class="fa fa-facebook-square" attr="facebook icon"></a></li>
								<li><a href="#" class="fa fa-twitter"></a></li>
								<li><a href="#" class="fa fa-instagram"></a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</footer>


	<!-- MODAL -->

	<!-- SCRIPTS -->
	<script src="../build/js/landing/jquery.js"></script>
	<script src="../build/js/landing/bootstrap.min.js"></script>
	<script src="../build/js/landing/jquery.stellar.min.js"></script>
	<script src="../build/js/landing/jquery.magnific-popup.min.js"></script>
	<script src="../build/js/landing/smoothscroll.js"></script>
	<script src="../build/js/landing/custom.js"></script>

</body>

</html>