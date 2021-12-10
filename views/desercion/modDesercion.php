
        <form method="POST" class="formulario-grupo">

            <label for="nombre">Causa de la desercion</label>
            <input type="text" name="desercion[nombre]" id="nombre" placeholder="Ingrese causa de deserción">

           <!-- <label for="fecha_inicio">Fecha inicio</label>
            <input type="date" name="semestre[fecha_inicio]" id="fecha_inicio">

            <label for="fecha_final">Fecha fin</label>
            <input type="date" name="semestre[fecha_final]" id="fecha_final">


            <label for="estado">Estado</label>
            <select name="estado" id="estado">
                <option value="ACTIVO">ACTIVO</option>
                <option value="INACTIVO">INACTIVO</option>
            </select>
-->
            <input id="idSemestre" type="hidden" value="">
            <button type="button" onclick="crearItemDesercion()">Aceptar</button>

        </form>

    