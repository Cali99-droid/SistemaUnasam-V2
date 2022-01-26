<div class="contenedor-grupos cont-borde">
    <h3 class="no-margin titulo-area"><i class="fas fa-exclamation-triangle"></i> Desercion</h3>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" id="buscarEv" placeholder="Buscar" class="busqueda-ev">
        </div>
        <div class=" nuevo-grupo__mod botones-grupo">

            <a class="btn-asignar" onclick="modal('modal_des', 'boton-agregar-integrante', 'close_des')">
                <i class="fas fa-plus"></i> Agregar Nuevo
            </a>
        </div>
    </div>
    <div class="contenedor-tabla tab-beneficio">

        <table id="mytable-ev">
            <thead>
                <tr>
                    <th>FECHA</th>
                    <th>DESCRIPCION</th>
                    <th>SEMESTRE</th>
                    <th>Acciones</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($desercionA as $desercionA) : ?>
                    <tr>
                        <td><?php echo $desercionA->fecha; ?></td>
                        <td><?php echo $desercionA->getDesercion(); ?></td>
                        <td><?php echo $desercionA->getSemestre(); ?></td>

                        <td>
                            <button class="btn-asignar" onclick="actualizarDesercionAlumno('<?php echo $desercionA->id; ?>', '<?php echo $desercionA->fecha; ?>', '<?php echo $desercionA->desercion_id; ?>')"> <i class=" fas fa-pencil-alt"></i> Editar</button>
                            <button onclick="eliminarDesercionAlumno(<?php echo $desercionA->id; ?>)" type="button" class="btn-asignar">
                                <i class="fas fa-trash"></i> Borrar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>


</div>

<!-- Modal Agregar-->
<div class="modal-agregar" id="modal_des">

    <div class="contenido-modal-grupo  modal-eventos">
        <div class="encabezado-modal">
            <h2 id="titulo_integrante">Agregar </h2>
            <span class="close close_des">&times;</span>

        </div>
        <div>
            <form class="formulario-grupo">

                <?php include 'nueva_desercion_alumno.php'; ?>
            </form>
        </div>

    </div>



</div>