<div class="rendimiento cont-borde ">
    <h3 class="no-margin titulo-area"><i class="fas fa-brain"></i> Rendimiento Académico</h3>
    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" id="buscarEv" placeholder="Buscar" class="busqueda-ev">
        </div>
        <div class=" nuevo-grupo__mod botones-grupo">

            <a class="btn-asignar" onclick="modal('modal_rend', 'boton-agregar-integrante', 'close-rend')">
                <i class="fas fa-plus"></i> Agregar Nuevo
            </a>
        </div>
    </div>
    <div class="contenedor-tabla">

        <table id="mytable-ev">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Semestre</th>
                    <th>Estado</th>
                    <th>Acciones</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($rendimientos as $rendimiento) : ?>
                    <tr>
                        <td><?php echo $rendimiento->id; ?></td>
                        <td><?php echo $rendimiento->getSemestre()->nombre; ?></td>
                        <td><?php echo $rendimiento->estado; ?></td>

                        <td>
                            <div class="form-tabla">
                                <a class="btn-asignar" onclick="actualizarRend('<?php echo $rendimiento->getSemestre()->id; ?>', '<?php echo $rendimiento->estado; ?>', <?php echo $rendimiento->id; ?>)"> <i class=" fas fa-pencil-alt"></i> Editar</a>
                                <button onclick="eliminarRend(<?php echo $rendimiento->id; ?>)" type="button" class="btn-asignar" onclick="">
                                    <i class="fas fa-trash"></i> Borrar</button>
                            </div>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>


</div>


<div class="modal-agregar" id="modal_rend">

    <div class="contenido-modal-grupo  modal-eventos">
        <div class="encabezado-modal">
            <h2 id="titulo_integrante">Agregar </h2>
            <span class="close close-rend">&times;</span>

        </div>
        <div>
            <form class="formulario-grupo">

                <?php include 'nuevo-rendimiento.php'; ?>
            </form>
        </div>

    </div>



</div>