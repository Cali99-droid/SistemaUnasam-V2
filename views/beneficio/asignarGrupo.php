<div>
    <div>
        <input type="hidden" value="" id="idbeneficio">

        <select class="js-example-basic-single " id="idTipoGrupo" name="idTipoGrupo">
            <?php foreach ($tipos as $tipo) : ?>
                <option value="<?php echo $tipo->id ?>"><?php echo $tipo->nombre ?></option>
            <?php endforeach; ?>
        </select>

    </div>
    <div>
        <select name="estado" id="estadoGrupo">
            <option value="ACTIVO">ACTIVO</option>
            <option value="INACTIVO">INACTIVO</option>
        </select>
    </div>
    <div>
        <button onclick="asignarBeneficioGrupo()" type="button">Asignar</button>
    </div>

</div>