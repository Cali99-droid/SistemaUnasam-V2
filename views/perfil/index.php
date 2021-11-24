<?php
$session_start;

?>
<div class="contenedor-grupos">

    <div class="datos-integrante">
        <div class="datos datos--ava">
            <img src="build/img/profile.svg" alt="Avatar" class="avatar-int">
        </div>

        <div class="datos datos--text">
            <span class="datos__nombre">Nombre: Perez Nolazco Alberto Juan</span>
            <p>ROL: ADMINSTRADOR</p>
            <p>DNI: 70548545</p>
            <p>Usuario: <?php echo  $_SESSION['username']; ?> </p>


        </div>
        <div class="datos">
            <div class=" datos--general zoom">
                <p class="info"><strong> AVISO! Usted está modificando su contraseña, por lo cual usted deberá de tener en cuenta que al iniciar sesión sus datos se actualizan.</strong></p>

            </div>
            <!-- <div class=" datos--general zoom">
                <p class="info"><strong> Total Beneficios Asignados Pendientes:</strong> <?php //echo $cantidadActivo 
                                                                                            ?> </p>
            </div> -->
        </div>

    </div>
<HR></HR>
    <div>
        <form class="formulario-grupo">
            <div class="form-group">

                <label for="passwordActual">
                    Contraseña Actual
                </label>
                <input type="password" class="form-control" id="passwordActual" />

                <label for="passwordNuevo">
                    Nueva Contraseña
                </label>
                <input type="password" class="form-control" id="passwordNuevo" />

                <label for="passworRepeat">
                    Repita Contraseña
                </label>
                <input type="password" class="form-control" id="passworRepeat" />

            </div>
            <div>
                <button type="button" class="btn btn-primary">
                    Aceptar
                </button>
                <input type="reset" class="btn btn-primary" value="Cacelar">

                </input>
            </div>
        </form>
    </div>