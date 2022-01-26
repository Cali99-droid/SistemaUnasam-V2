<?php
?>
<div class="contenedor-grupos">


    <div class="datos-integrante cont-borde">

        <div class="volver">

        </div>

        <div class="datos datos--text">
            <div class="contenido_datos_integrante">
                <p class="datos__nombre"></i> <?php echo $integrante->nombre . " " . $integrante->apellido ?></p>
                <span class="etiq"> <?php echo $integrante->codigo ?> </span>

            </div>

            <div class="datos__integrante">

                <p>Inscrito desde: <span> <?php echo $integrante->fecha_inscripcion ?></span></p>
            </div>


        </div>

        <div class="rendimiento">
            <a onclick="history.back ()" class="btn-asignar"><i class='bx bx-group'></i> Ir a Grupo</a>
            <button class="btn-slide btn-asignar" onclick="currentSlide(1)"><i class="fas fa-trophy"></i> Desempeño</a></button>
            <button class="btn-slide btn-asignar" onclick="currentSlide(2)"><i class="fas fa-brain"></i> Rendimiento</a></button>
            <button class="btn-slide btn-asignar" onclick="currentSlide(3)"><i class="fas fa-exclamation-triangle"></i> Deserción</a></button>
        </div>

    </div>
    <div class="slideshow-container">

        <div class="mySlides fade">

            <?php include_once 'desempenio.php'; ?>
        </div>
        <div class="mySlides fade">

            <?php include_once 'rendimiento.php'; ?>
        </div>
        <div class="mySlides fade">
            <?php include_once 'desercionAlumno.php'; ?>
        </div>


    </div>

    <!-- inicio 
    <div style="text-align:center" class="ir">
        <span class="dot" onclick="currentSlide(1)">ir desempeño</span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    fin delatee-->

</div>


<div class="modal-agregar" id="modal-asistencia">

    <div class="contenido-modal-grupo   modal-eventos">
        <div class="encabezado-modal">
            <h2 id="titulo_integrante">Asignar Asistencia</h2>
            <span class=" close close-asis" id="close-asis">&times;</span>
        </div>

        <div>
            <form class="formulario-grupo">
                <label for="tipo">Tipo de participación</label>
                <input type="text" name="tipo" id="tipo">
                <input type="hidden" value="" name="idinvitacion" id="idinvitacion">
                <input type="hidden" value="<?php echo $integrante->idAlumnoGrupo; ?>" name="idAlumnoGrupo" id="idAlumnoGrupo">
                <button type="reset" onclick="confirmarAsistencia()" class="btn-asignar">Aceptar</button>
            </form>

        </div>


    </div>

</div>



<div class="modal-agregar" id="modal-asigBeneficio">

    <div class="contenido-modal-grupo   modal-eventos">
        <div class="encabezado-modal">
            <h2 id="titulo_integrante">Asignar Beneficio</h2>
            <span class=" close close-ben" id="close-ben">&times;</span>
        </div>

        <div>
            <form class="formulario-grupo">
                <label for="tipo">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion">

                <label for="estado">Estado</label>
                <select name="estado" id="estado">
                    <option value="COMPLETADO">COMPLETADO</option>
                    <option value="PENDIENTE">PENDIENTE</option>
                </select>
                <input type="hidden" id="idbeneficioXtipo">

                <button id="btn_confirmarBen" type="reset" class="btn-asignar">Aceptar</button>
            </form>
        </div>


    </div>

</div>

<?php $script = '<script src="../build/js/slides.js"></script>' ?>