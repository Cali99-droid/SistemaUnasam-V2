<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Gestión de Semestres</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar">
        </div>

        <div class="nuevo-grupo">
            <button type="button" class="boton-grupo" id="boton-agregar-semestre" onclick="modal('modal-agregar-semestre', 'boton-agregar-semestre', 'close')">
                <i class=" fas fa-plus-circle"></i> Agregar Semestre</button>
        </div>
    </div>

    <div class="contenedor-tabla tab-beneficio">

        <table>
            <tr>
                <th>Nombre</th>
                <th>Fecha de inicio</th>
                <th>Fecha Final</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>

            <?php foreach ($semestres as $semestre) :  ?>
                <tr>
                    <td><?php echo $semestre->nombre; ?></td>
                    <td><?php echo $semestre->fecha_inicio ?></td>
                    <td><?php echo $semestre->fecha_fin; ?></td>
                    <td><?php echo $semestre->estado; ?></td>
                    <td>


                        <button type="button" class="boton-acciones" onclick="actualizarSemestre(<?php echo $semestre->id; ?>,'<?php echo $semestre->nombre; ?>', '<?php echo $semestre->fecha_inicio; ?>', '<?php echo $semestre->fecha_fin; ?>', '<?php echo $semestre->estado; ?>')">
                            <i class=" fas fa-pencil-alt"></i> </button>


                        <input type="hidden" name="id" value="<?php echo $semestre->id; ?>">
                        <button type="button" class="boton-acciones borrar">
                            <i class="fas fa-trash"></i> </button>



                    </td>
                </tr>
            <?php endforeach; ?>

        </table>

    </div>


</div>

</div>



</div>
</div>

<!--ventana modal-->
<div class="modal-agregar" id="modal-agregar-semestre">


    <div class="contenido-modal-grupo">
        <div class="encabezado-modal">
            <h2>Nuevo Semestre</h2>
            <span class="close">&times;</span>

        </div>
        <form method="POST" class="formulario-grupo">

            <label for="nombre">Nombre del Semestre</label>
            <input type="text" name="semestre[nombre]" id="nombre">

            <label for="fecha_inicio">Fecha inicio</label>
            <input type="date" name="semestre[fecha_inicio]" id="fecha_inicio">

            <label for="fecha_final">Fecha fin</label>
            <input type="date" name="semestre[fecha_final]" id="fecha_final">

            <div class="estado">
                <label for="estado">Estado</label>
                <select name="estado" id="estado">
                    <option value="ACTIVO">ACTIVO</option>
                    <option value="INACTIVO">INACTIVO</option>
                </select>

            </div>
            <input id="idSemestre" type="hidden" value="">
            <button type="button" onclick="crearSemestre()">Aceptar</button>

        </form>