<label for="fecha">Fecha</label>
<input type="date" id="fecha">
<label for="causaDesercion">Causa de desercion</label>
<select class="js-example-basic-single " id="idCausaDesercion" name="idCausaDesercion">
    <?php foreach ($desercion as $desercionEstudiantil) : ?>
        <option value="<?php echo $desercionEstudiantil->id ?>"><?php echo $desercionEstudiantil->descripcion ?></option>
    <?php endforeach; ?>
</select>
<!--
<label for="semestre">Semestre</label>
<select class="js-example-basic-single " id="semestre" name="idTipoGrupo">
    <?php //foreach ($semestres as $semestre) : 
    ?>
        <option value="<?php //echo $semestre->id 
                        ?>"><?php //echo $semestre->nombre 
                            ?></option>
    <?php // endforeach; 
    ?>
</select>

<label for="estado">Estado</label>
<select name="estado" id="estado">
    <option value="regular">REGULAR</option>
    <option value="irregular">IRREGULAR</option>
</select>
    -->
<input type="hidden" id="idAlumno" value="<?php echo $integrante->idAlumno ?>">
<input type="hidden" id="id_desercion_alumno" value="">
<button onclick="Crear_desercion_alumno()" type="button" class="btn-asignar">Agregar</button>