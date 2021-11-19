<?php

namespace Controllers;

use Model\Grupo;
use Model\TipoGrupo;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Beneficio;
use Model\Beneficio_x_alumno;
use Model\Beneficio_x_tipo_grupo;
use Model\CondicionEconomica;
use Model\Integrante;
use Model\Invitacion;
use Model\ParticipacionAlumno;

class GrupoController
{
    public static function index(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $grupo = new Grupo($_POST['grupo']);

            /**Generar nombre unico */
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


            /**Setear imagen */
            if ($_FILES['grupo']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['grupo']['tmp_name']['imagen'])->fit(800, 600);
                $grupo->setImagen($nombreImagen);
            }

            /**Subida de Imagenes */
            //crear carpeta
            if (!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }
            //guarda la imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);
            //guarda en la base de datos
            $resultado = $grupo->crear();
        }

        $grupos = Grupo::all();
        $tipos = TipoGrupo::all();
        $grupo = new Grupo();
        $router->render('grupo/index', ['grupos' => $grupos, 'grupo' => $grupo, 'tipos' => $tipos]);
    }


    public static function grupo(Router $router)
    {
        $id = validarORedireccionar('/grupos');
        $grupo = Grupo::find($id);
        $escuelas = Integrante::consulta("SELECT * FROM escuela");
        $tipos = TipoGrupo::all();
        $condiciones = CondicionEconomica::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $grupo->sincronizar($_POST['grupo']);

            /**Generar nombre unico */
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


            /**Setear imagen */
            if ($_FILES['grupo']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['grupo']['tmp_name']['imagen'])->fit(800, 600);
                $grupo->setImagen($nombreImagen);
            }
            //guarda la imagen en el servidor
            if ($_FILES['grupo']['tmp_name']['imagen']) {
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }
            //guarda en la base de datos

            $resultado = $grupo->guardar();
            if ($resultado) {
                header('Location: /grupo?id=' . $grupo->id . '&resultado=2');
            }
        }

        if ($grupo) {
            $integrantes = $grupo->getIntegrantes();
            $router->render('grupo/grupo', [
                'grupo' => $grupo,
                'integrantes' => $integrantes,
                'escuelas' => $escuelas,
                'condiciones' => $condiciones,
                'tipos' => $tipos

            ]);
        } else {
            echo ' no existe el grupo';
        }
    }

    public static function integrante(Router $router)
    {

        $dni = $_GET['dni'];
        $integrante = Integrante::where('dni', $dni);
        $grupo = Grupo::find($integrante->idgrupo_universitario);
        $invitaciones = Invitacion::where_all('grupo_universitario_id', $grupo->id);
        $participaciones = ParticipacionAlumno::where_all('alumno_x_grupo_id', $integrante->idAlumnoGrupo);
        $beneficios = Beneficio_x_tipo_grupo::where_all('tipo_grupo_id', $grupo->tipo_grupo_id);
        $beneficioAsignados = Beneficio_x_alumno::where_all('alumno_x_grupo_id',  $integrante->idAlumnoGrupo);

        $router->render('grupo/integrante', [
            'integrante' => $integrante,
            'grupo' => $grupo,
            'invitaciones' => $invitaciones,
            'participaciones' => $participaciones,
            'beneficios' => $beneficios,
            'beneficioAsignados' => $beneficioAsignados


        ]);
    }

    public static function getIntegrante()
    {
        $id = $_POST['id'];

        $integrante =  Integrante::where('idpersona', $id);
        echo json_encode($integrante);
    }

    public static function setIntegrante()
    {
        $id = $_POST['id'];

        $integrante =  Integrante::where('idpersona', $id);
        echo json_encode($integrante);
    }
}
