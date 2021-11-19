<?php //debuguear($beneficioAsignados);
?>
<div class="contenedor-grupos">

    <div class="datos-integrante">
        <div class="datos datos--ava">
            <img src="build/img/profile.svg" alt="Avatar" class="avatar-int">
        </div>

        <div class="datos datos--text">
            <span class="datos__nombre"><?php echo $integrante->nombre . " " . $integrante->apellido ?></span>
            <p>DNI: <?php echo $integrante->dni ?></p>
            <p><?php echo $integrante->dni ?> </p>
            <p><?php echo $grupo->nombre ?></p>

        </div>
        <div class="datos">
            <div class=" datos--general zoom">
                <p class="info"><strong> Total participaciones:</strong> 3</p>

            </div>
            <div class=" datos--general zoom">
                <p class="info"><strong> Total Beneficios Asignados Pendientes:</strong> <?php //echo $cantidadActivo 
                                                                                            ?> </p>
            </div>
        </div>

    </div>

    <div class="detalles-integrante">
        <div class="tabs">
            <button class="tablink" onclick="openPage('invitacion', this, ' #005b82')">Invitaciones</button>
            <button class="tablink" onclick="openPage('participacion', this, ' #005b82')" id="defaultOpen">Participaciones</button>
            <button class="tablink" onclick="openPage('beneficiosDerecho', this, '#008896')">Derechos</button>
            <button id="ben" class="tablink" onclick="openPage('beneficiosAsig', this, '#008896')">Beneficios</button>
        </div>


        <div id="invitacion" class="tabcontent">
            <div class="detalle">

                <div class="contenedor-tabla contenedor-tabla__perfil">

                    <table>
                        <thead>
                            <tr>
                                <th>Evento</th>
                                <th>Fecha y Hora de Invitacion</th>
                                <th>Estado</th>
                                <th>Observacion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($invitaciones as $invitacion) :  ?>
                                <?php



                                ?>
                                <tr>
                                    <td><?php echo $invitacion->getEvento()->nombre; ?></td>
                                    <td><?php echo $invitacion->fecha_hora; ?></td>


                                    <td><a class="<?php echo $invitacion->estado == 'VIGENTE' ? 'label-ok' : 'label' ?>"><?php echo  $invitacion->estado; ?></a></td>

                                    <td><?php echo $invitacion->observacion; ?></td>

                                    <td><button id="asignar-asistencia" class="boton-asignar" onclick="asignarAsistencia('<?php echo $invitacion->id; ?>',
                                '<?php echo $integrante->idAlumnoGrupo; ?>','modal-asistencia', 'btn', 'close-asis' )"><i class="fas fa-plus-circle"></i> Asignar Asistencia</button></td>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div id="participacion" class="tabcontent">
            <div class="detalle">

                <div class="contenedor-tabla contenedor-tabla__perfil">

                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Evento</th>
                                <th>Estado</th>

                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($participaciones as $participacion) : ?>

                                <tr>
                                    <td><?php echo $participacion->tipo; ?></td>
                                    <td><?php echo $participacion->tipo; ?></td>
                                    <td><?php echo $participacion->tipo; ?></td>
                                    <td><button class="boton-asignar"><i class="fas fa-plus-circle"></i> Accion</button></td>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div id="beneficiosDerecho" class="tabcontent">
            <div class="detalle">


                <div class="contenedor-tabla contenedor-tabla__perfil">

                    <table>
                        <thead>
                            <tr>
                                <th>Beneficio</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($beneficios as $beneficio) :  ?>

                                <tr>
                                    <td><?php echo $beneficio->getNombreBeneficio(); ?></td>

                                    <td><a class="<?php echo $beneficio->estado == 'ACTIVO' ? 'label-ok' : 'label' ?>"><?php echo $beneficio->estado; ?></a></td>

                                    <td><button class="boton-asignar" onclick="asignarBeneficio(<?php //echo $beneficio->getIdBeneXTipo($idTipo) 
                                                                                                ?>, <?php //echo $id['idAlumnoGrupo'] 
                                                                                                    ?>)"> <i class="fas fa-plus-circle"></i> Asignar</button></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>




            </div>
        </div>

        <div id="beneficiosAsig" class="tabcontent">
            <div class="detalle">



                <div class="contenedor-tabla contenedor-tabla__perfil">

                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha de Asignación</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($beneficioAsignados as $bena) : ?>


                                <tr>
                                    <td><?php echo $bena->estado; ?></td>
                                    <td><?php echo $bena->fecha_efectiva; ?></td>

                                    <td><a type="button" id="boton-activar" onclick="actualizarEstadoBeneficio(<?php echo  $bena->id ?>)" class="<?php echo  $bena->estado == 'CUMPLIDO' ? 'label-ok ' : 'label' ?>"><?php echo  $bena->estado; ?></a></td>

                                    <td><button>Quitar</button></td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>




            </div>
        </div>


    </div>


</div>


<div class="modal-agregar" id="modal-asistencia">

    <div class="contenido-modal-grupo   modal-eventos">
        <div class="encabezado-modal">
            <h2 id="titulo_integrante">Asignar Asistencia</h2>
            <span class=" close close-asis">&times;</span>
        </div>

        <div>
            <label for="tipo">Tipo de participación</label>
            <input type="text" name="tipo" id="tipo">
            <input type="hidden" value="" name="idinvitacion" id="idinvitacion">
            <input type="hidden" value="" name="idAlumnoGrupo" id="idAlumnoGrupo">
            <button onclick="confirmarAsistencia()">Aceptar</button>
        </div>


    </div>

</div>