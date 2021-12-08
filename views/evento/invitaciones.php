<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Gestión de Invitaciones</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" id="buscarEv" placeholder="Buscar" class="busqueda-ev">
        </div>


    </div>

    <div class="contenedor-tabla tab-beneficio">

        <table id="mytable-ev">
            <thead>
                <tr>
                    <th>Fecha Invitación</th>
                    <th>Evento</th>
                    <th>Grupo</th>
                    <th>Observación</th>
                    <th>Estado</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($invitaciones as $invitacion) : ?>
                    <tr>
                        <td><?php echo $invitacion->fecha_hora; ?></td>
                        <td><?php echo $invitacion->getEvento()->nombre; ?></td>
                        <td><?php echo $invitacion->getGrupo()->nombre; ?></td>
                        <td><?php echo $invitacion->observacion; ?></td>
                        <td><?php echo $invitacion->estado; ?></td>
                        <td>
                            <a class="btn-asignar"> <i class=" fas fa-pencil-alt"></i> Editar</a>
                            <button type="button" class="btn-asignar">
                                <i class="fas fa-trash"></i> Borrar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>


</div>