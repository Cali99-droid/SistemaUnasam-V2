<?php // debuguear($user->getDatos()); 
?>

<div class="contenedor-grupos">

    <div class="cont-perfil">
        <div class="datos-integrante">
            <div class="datos contenido_datos_integrante datos-integrante cont-borde">
                <h4 class="datos__nombre"><?php echo $datos->nombre . ' ' . $datos->apellido ?></h4>
                <p><span class="etiq">ROL:</span> <?php echo $datos->tipo ?> </p>
                <p><span class="etiq">DNI:</span> <?php echo $datos->dni ?></p>
                <p><span class="etiq">Usuario: </span><?php echo  $_SESSION['username']; ?>
                </p>
            </div>
        </div>

        <div class="contenido-form-per cont-borde form-perfil">

            <h3>Cambiar Contraseña</h3>
            <?php include_once __DIR__ . "/../templates/alertas.php" ?>
            <form class="formulario-perfil" method="POST" action="/perfil">
                <?php include_once __DIR__ . "/../templates/recuperacion.php" ?>
            </form>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".alerta").fadeOut(1500);
            }, 3000);
        });
    </script>