<!--
<div class="buscar" id="cont_buscar">
    <label for="buscar" id="lbBuscar">Buscar</label>
    <input type="text" name="buscar" id="buscar" placeholder="Buscar por DNI">
    <button type="button" id="btnBuscarDNI" name="btnBuscarDNI" onclick="BuscarIntegrante($('#buscar').val())">Buscar</button>
</div>
-->
<div class="contenedor-al ">
    <div class="columna-al">
        <label for="dni">DNI</label>
        <input type="text" name="integrante[dni]" id="dni_s" maxlength="8">

        <label for="nombre">Nombre</label>
        <input type="text" name="integrante[nombre]" id="nombre_s">

        <label for="apellido">Apellido</label>
        <input type="text" name="integrante[apellido]" id="apellido_s">


        <label for="genero">Género</label>
        <select name="integrante[genero]" id="genero_s">
            <option value="" disabled selected>--Seleccione--</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>

        <label for="direccion">Dirección</label>
        <input type="text" name="integrante[direccion]" id="direccion_s">
    </div>


    <div class="columna-al">
        <label for="email">Email</label>
        <input type="email" name="integrante[email]" id="email_s">

        <label for="telefono">Teléfono</label>
        <input type="text" name="integrante[telefono]" maxlength="9" id="telefono_s" placeholder="Ingrese teléfono">

        <label for="codigo_alumno">Código</label>
        <input type="text" name="integrante[codigo_alumno]" id="codigo_alumno_s">

        <label for="idEscuela" nombre-usu>Escuela</label>
        <select name="integrante[idEscuela]" id="idEscuela_s">
            <option value="" selected disabled>--Seleccione--</option>
            <?php while ($row = mysqli_fetch_assoc($escuelas)) : ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?>
                <?php endwhile; ?></option>

        </select>




        <label for="nombre_procedencia">Procedencia</label>
        <input type="text" name="integrante[nombre_procedencia]" id="nombre_procedencia_s">



    </div>



    <div class="columna-al">
        <label for="estado">Estado</label>
        <select name="integrante[estado]" id="estado_s">
            <option value="" disabled selected>--Seleccione--</option>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>


        <label for="idCondicionEconomica">Condición Socioeconomica</label>
        <select name="integrante[idCondicionEconomica]" id="idCondicionEconomica_s" required>
            <option value="" selected disabled>--Seleccione--</option>
            <?php foreach ($condiciones as $condicion) : ?>
                <option value="<?php echo $condicion->id; ?>"><?php echo $condicion->nombre; ?>
                <?php endforeach; ?></option>
        </select>
        <label for="descripcion">Descripción</label>
        <textarea name="integrante[descripcion]" id="descripcion_s" cols="30" rows="4"></textarea>

        <input type="hidden" name="cod" value="2" id="valor">
        <input type="hidden" name="integrante[idPersona]" value='' id="idPersona_s">
        <button type="reset" onclick="crearIntegrante()">Aceptar</button>
    </div>



</div>

<script>
    $('#dni_s').bind('keyup paste', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    $('#telefono_s').bind('keyup paste', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>