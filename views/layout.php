<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNASAM | <?php echo $titulo ?? '' ?></title>
    <link rel="icon" href="http://sga.unasam.edu.pe/images/icons/icon.png">
    <link rel="stylesheet" href="../build/css/app.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://www.google.com/jsapi"></script>
    <script src="../build/js/stacktable.js"></script>
    <link href="../build/css/stacktable.css" rel="stylesheet">

</head>

<body>

    <div class="contenedor-todo">
        <div class="contenedor-barra ocultar " id="cont-barra">
            <nav class=" navegacion">
                <div class="contenido-cabecera mostrar-logo">

                    <div class="contenedor-logo ">
                        <img src="build/img/escudoUNASAM.webp" alt="escudo unasam" class="logo-unasam">

                    </div>

                    <div class="texto-unasam">
                        <h3>UNASAM</h3>
                        <img id="cerrar-menu" src="build/img/menu.svg" alt="imagen-cerrar" id="mobile-menu">
                    </div>
                </div>
                <div class="items ">

                    <a href="/inicio" title="Inicio" class=' <?php echo ($titulo === 'Inicio') ? 'activo' : ''; ?>'>
                        <i class='bx bxs-chart'></i>Análisis
                    </a>
                    <a href="/grupos" title="Grupos" class=' <?php echo ($titulo === 'Organizaciones') ? 'activo' : ''; ?>'><i class='bx bx-group'></i>Organizaciones</a>
                    <a href="/beneficios" title="Beneficios" class=' <?php echo ($titulo === 'Beneficios') ? 'activo' : ''; ?>'><i class='bx bx-medal'></i>Beneficios</a>
                    <a href="/eventos" title="Eventos" class=' <?php echo ($titulo === 'Eventos') ? 'activo' : ''; ?>'><i class='bx bxs-calendar'></i>Eventos</a>
                    <a href="/reporte" title="Reportes" class=' <?php echo ($titulo === 'Reportes') ? 'activo' : ''; ?>'><i class="bx bxs-file"></i>Reportes</a>
                    <a href="/desercion" title="Deserción" class=' <?php echo ($titulo === 'Desercion') ? 'activo' : ''; ?>'><i class="fas fa-user-graduate"></i>Deserción</a>
                    <div class="item">
                        <a href="javascript:void(0)" class=' <?php echo ($titulo === 'Administrador') ? 'activo' : ''; ?>' class="administrador" onclick="mostrarAdmin()"><i class="fas fa-user-tie" title="Administrador"></i>Administrador</a>
                        <div class="sub-item " id="sub-item">
                            <a href="/tipos">Tipos de Organización</a>
                            <a href="/usuarios">Usuarios</a>
                            <a href="/roles">Roles</a>
                            <a href="/semestres">Semestres</a>
                        </div>
                    </div>
                    <div class="accion-perfil">
                        <a href="/perfil"><i class="fas fa-user"></i>Ver Perfil</a>
                        <a href="/logout"><i class="fas fa-sign-out-alt"></i> Salir</a>
                    </div>
                </div>


            </nav>

        </div>

        <div class="contenedor-principal" id="cont-prin">
            <div class="encabezado">
                <div class="semestre">
                    <button type="button" class="openbtn">☰</button>
                    <!--onclick="openNav()"-->
                    <h2></h2>
                </div>

                <div class="perfil" id="perfil">

                    <div>

                        <button id="boton-perfil" class="boton-perfil" type="button"><?php echo $_SESSION['username']; ?><i class='bx bxs-user-circle'></i></button>
                    </div>

                    <div class="contenido-perfil" id="contenido-perfil" style="z-index: 2;">
                        <a href="/perfil"><button>Ver Perfil</button></a>
                        <a href="/logout"><button class="boton-salir">Salir</button></a>
                    </div>


                </div>
            </div>

            <?php echo $contenido; ?>



        </div>
    </div>


    <script src='../build/js/app.js'></script>
    <?php echo $script ?? ''; ?>
</body>

</html>