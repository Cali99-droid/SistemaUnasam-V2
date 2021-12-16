<div class="contenedor-grupos">
    <div class="titulo-grupos con_accion">
        <a onclick="history.back ()" class="btn-asignar"><i class="fas fa-arrow-circle-left"></i> Volver</a>
        <h2 class="no-margin">Desercion Alumno <br><span><?php echo $alumno->nombre . ' ' . $alumno->apellido ?></span></h2>

    </div>

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
                        <!--<a class="btn-asignar" onclick="actualizarRend('<?php// echo $desercionA->getSemestre()->id; ?>', '<?php //echo $desercionA->estado; ?>', <?php //echo $desercionA->id; ?>)"> <i class=" fas fa-pencil-alt"></i> Editar</a>-->
                            <button onclick="eliminarRend(<?php echo $desercionA->id_desercion_alumno; ?>)" type="button" class="btn-asignar" onclick="">
                                <i class="fas fa-trash"></i> Borrar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>


</div>

<!-- Modal Agregar-->
<div class="modal-agregar" id="modal_rend">

    <div class="contenido-modal-grupo  contenedor-grupos modal-eventos">
        <div class="encabezado-modal">
            <h2 id="titulo_integrante">Agregar </h2>
            <span class="close close-rend">&times;</span>

        </div>
        <div>
            <form class="formulario-grupo">

                <?php include 'nueva_desercion_alumno.php'; ?>
            </form>
        </div>

    </div>



</div>