<label for="nombre">Tipo Rol</label>
<input type="text" id="nombre">

<div class="privilegios">
    <?php while ($privi = $privilegios->fetch_object()) : ?>
        <input type="checkbox" class="chek" id="<?php echo $privi->id; ?>" value="<?php echo $privi->id; ?>"><?php echo $privi->nombre; ?>
    <?php endwhile; ?>
</div>

<input type="hidden" id="cod" value="1">
<input type="hidden" id="idRol" value="">
<button class="boton" type="button" onclick="crearRol()">Aceptar</button>