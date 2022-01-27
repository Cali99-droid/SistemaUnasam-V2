<div class="contenedor-grupos">
    <div class="titulo-grupos">
        <h2 class="no-margin">Organizaciones Estudiantiles</h2>
    </div>
    <div class="acciones-grupo">
        <div class="buscar">
            <i class="fas fa-search"></i> <input id="nom" type="text" name="valor" placeholder="Buscar por Tipo o Nombre">
        </div>
        <div class="nuevo-grupo__mod">
            <a type="button" class="btn-asignar" id="boton-agregar-grupo">
                <i class="fas fa-plus-circle"></i> Nueva Organización </a>
        </div>
    </div>
    <div class="grupos">
        <div class="contenido-grupos" id="contenedor-grupos">
        </div>
    </div>
</div>
</div>
</div>

<div class="modal-agregar " id="modal-grupo">
    <div class="contenido-modal-grupo ">
        <div class="encabezado-modal">
            <h2>Nuevo Grupo</h2>
            <span class="close close-grupo">&times;</span>
        </div>
        <form class="formulario-grupo" method="POST" action="/grupos" enctype="multipart/form-data">

            <?php include 'formulario.php'; ?>

            <button id="crearGrupo" type="button" class="crearGrupo">Aceptar</button>
        </form>
    </div>
</div>


<?php
$script = "<script src='build/js/grupos.js'></script>";
?>
<?php include_once __DIR__ . "/../templates/modal/nuevoTipo.php" ?>