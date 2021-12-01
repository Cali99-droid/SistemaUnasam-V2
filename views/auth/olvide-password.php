<div class="contenedor-principal--log">
    <div class="video">
        <div class="overlay">
            <div class=" contenido-video">

                <form class="modal-content animate" action="/olvide" method="POST">
                    <div class="container">

                        <label for="email"><b>Restablece tu password escribiendo tu email a continuación </b></label> <?php include_once __DIR__ . "/../templates/alertas.php" ?>
                        <input type="email" placeholder="Ingrese tu correo" name="email" class="login-text" required>
                        <button type="submit" class="boton-acceder">Enviar Instrucciones</button>
                    </div>
                </form>
            </div>
        </div>
        <video autoplay muted loop>
            <source src="/video/vd.mp4" type="video/mp4">
        </video>
    </div>

</div>
<div class="footer">
    <p> Copyright &copy 2021 Todos los Derechos Reservados - Universidad Nacional Santiago Antunez de Mayolo</p>
</div>