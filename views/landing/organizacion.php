<?php //debuguear($beneficios);

use Carbon\Carbon;
use Model\Grupo;

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
                    <div class="">
                        <h2><?php echo $grupo->nombre ?></h2>

                    </div>
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="">
                        <img src="/imagenes/<?php echo $grupo->imagen ?>" alt="">

                    </div>
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




    <!-- SCRIPTS -->
    <script src="../build/js/landing/jquery.js"></script>
    <script src="../build/js/landing/bootstrap.min.js"></script>
    <script src="../build/js/landing/jquery.stellar.min.js"></script>
    <script src="../build/js/landing/jquery.magnific-popup.min.js"></script>
    <script src="../build/js/landing/smoothscroll.js"></script>
    <script src="../build/js/landing/custom.js"></script>

</body>

</html>