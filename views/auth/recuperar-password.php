<div class="contenedor-principal--log">
    <div class="video">
        <div class="overlay">
            <div class=" contenido-video">

                <div class="modal-content animate">
                    <div>
                        <h3>Cambiar Contraseña</h3>
                        <?php include_once __DIR__ . "/../templates/alertas.php" ?>
                        <form class="formulario-grupo " method="POST">
                            <label for="passwordNuevo">
                                Nueva Contraseña
                            </label>
                            <input type="password" class="form-control" id="passwordNuevo" name="pass" />
                            <br>
                            <label for="passworRepeat">
                                Repita Contraseña
                            </label>
                            <input type="password" class="form-control" id="passworRepeat" name="rpass" />
                            <button type="submit" class="btn btn-primary">
                                Aceptar
                            </button>
                        </form>
                    </div>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            setTimeout(function() {
                                $(".alerta").fadeOut(1500);
                            }, 3000);
                        });
                    </script>

                </div>


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