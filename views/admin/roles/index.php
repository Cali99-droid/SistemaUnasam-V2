<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Gestión de Roles</h2>
    </div>

    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Buscar">
        </div>

        <div class="nuevo-grupo">
            <form method="POST" class="formulario-grupo">

                <label for="nombre">Tipo Rol</label>
                <input type="text" name="semestre[nombre]" id="nombre">

               
                <div class="estado">
                   
                    <input type="checkbox" name="semestre[estado]" id="estado" value="activo">GRUPOS
                    <input type="checkbox" name="semestre[estado]" id="estado" value="activo">EVENTOS
                    <input type="checkbox" name="semestre[estado]" id="estado" value="activo">SEMESTRE
                    <input type="checkbox" name="semestre[estado]" id="estado" value="activo">BENEFICIOS
                    <input type="checkbox" name="semestre[estado]" id="estado" value="activo">ADMINISTRADOR
                    
                </div>

                <button class="" type="submit">Aceptar</button>

            </form>
        </div>
    </div>

    <div class="contenedor-tabla tab-beneficio">

        <table>
            <thead>
                <tr>
                    <th>ROL</th>
                    <th>PERIMISOS</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>

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