<div class="contenedor-principal--log">
    <div class="video">
        <div class="overlay">
            <div class=" contenido-video">


                <form class="modal-content animate " method="POST">
                    <div class="container">
                        <p><b>Cambiar Contraseña</b></p>
                        <?php include_once __DIR__ . "/../templates/alertas.php" ?>
                        <label for="passwordNuevo">
                            Nueva Contraseña
                        </label>
                        <input type="password" id="passwordNuevo" name="pass" class="login-text" />

                        <label for="passworRepeat">
                            Repita Contraseña
                        </label>
                        <input type="password" id="passworRepeat" name="rpass" class="login-text" />
                        <button type="submit" class="boton-acceder">
                            Aceptar
                        </button>
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


<script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            $(".alerta").fadeOut(1500);
        }, 3000);
    });
</script>