<div class="detalles-integrante cont-borde ">
    <h3 class="no-margin titulo-area"><i class="fas fa-trophy"></i> Desempeño</h3>
    <div class="tabs">
        <button id="defaultOpen" class="tablink" onclick="openPage('invitacion', this, ' #0c407c', 'tabcontent')"><i class="far fa-calendar-plus"></i> Invitaciones</button>
        <button id="participaciones" class="tablink" onclick="openPage('participacion', this, ' #0c407c', 'tabcontent')"><i class="fas fa-calendar-check"></i> Participaciones</button>
        <button class="tablink" id="benDer" onclick="openPage('beneficiosDerecho', this, '#0c407c', 'tabcontent')"><i class="fas fa-th-list"></i> Derechos</button>
        <button id="ben" class="tablink" onclick="openPage('beneficiosAsig', this, ' #0c407c', 'tabcontent')"><i class="fas fa-hands-helping"></i> Beneficios</button>
    </div>

    <div id="invitacion" class="tabcontent fade">
        <div class="detalle">

            <div class="contenedor-tabla tabla_tab">

                <table class="table_res">
                    <thead>
                        <tr>
                            <th>Evento</th>
                            <th>Fecha y Hora de Invitacion</th>
                            <th>Estado</th>
                            <th>Observacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead> <!-- asignarAsistencia -->
                    <tbody id="cuerpo-inv">



                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div id="participacion" class="tabcontent fade">
        <div class="detalle">

            <div class="contenedor-tabla ">

                <table class="table_res">
                    <thead>
                        <tr>


                            <th>Evento</th>
                            <th>Tipo de Participacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="cuerpo-part">
                        <!--
                        <?php // foreach ($participaciones as $participacion) : 
                        ?>

                            <tr>
                                <td><?php // echo $participacion->getEvento(); 
                                    ?></td>
                                <td><?php //echo $participacion->tipo; 
                                    ?></td>

                                <td><button onclick="quitarParticipacion(<?php //echo $participacion->id 
                                                                            ?>, <?php //echo $integrante->idAlumnoGrupo; 
                                                                                ?>)" class="boton-asignar"><i class="fas fa-minus-circle"></i> Quitar</button></td>
                      
                        </tr>  -->
                        <?php //endforeach; 
                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div id="beneficiosDerecho" class="tabcontent fade">
        <div class="detalle">
            <div class="contenedor-tabla tabla_tab">

                <table class="table_res">
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

                                <td><button class="boton-asignar" onclick="asignarBeneficio(<?php echo $beneficio->id ?> , <?php echo $integrante->idAlumnoGrupo ?>)"> <i class="fas fa-plus-circle"></i> Asignar</button></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>




        </div>
    </div>

    <div id="beneficiosAsig" class="tabcontent fade">
        <div class="detalle">



            <div class="contenedor-tabla contenedor-tabla__perfil">

                <table id="mytable">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Fecha de Asignación</th>
                            <th>Estado</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($beneficioAsignados as $bena) : ?>


                            <tr>
                                <td><?php echo $bena->getNombreBeneficio(); ?></td>
                                <td><?php echo $bena->descripcion; ?></td>
                                <td><?php echo $bena->fecha_efectiva; ?></td>

                                <td>
                                    <input type="hidden" id="idBene" value="<?php echo  $bena->id ?>">
                                    <button id="<?php echo  $bena->id ?>" class="<?php echo  $bena->estado == 'COMPLETADO' ? 'label-ok' : 'label' ?> btn-toggle bt<?php echo  $bena->id ?>"><?php echo $bena->estado; ?></button>
                                </td>


                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>