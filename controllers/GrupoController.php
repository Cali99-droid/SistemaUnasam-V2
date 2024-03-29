<?php

namespace Controllers;

use Model\Grupo;
use Model\TipoGrupo;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\AlumnoGrupo;
use Model\Beneficio;
use Model\Beneficio_x_alumno;
use Model\Beneficio_x_tipo_grupo;
use Model\CondicionEconomica;
use Model\Integrante;
use Model\Invitacion;
use Model\ParticipacionAlumno;
use Model\Semestre;
use Model\Rendimiento_academico;
use Model\desercion_alumno;
use Model\Desercion;

class GrupoController
{
    public static function index(Router $router)
    {
        //session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $grupo = new Grupo($_POST);

            /** Generar nombre unico */
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            /**Setear imagen */
            if ($_FILES['imagen']['tmp_name']) {
                $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
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

            // * Response API
            $grupoNuevo = Grupo::find($resultado['id']);
            $grupoNuevo->getCantidadIntegrantes();
            $grupoNuevo->getTipoGrupo();
            $respuesta = [
                'tipo' => 'exito',
                'id' => $resultado['id'],
                'mensaje' => 'Organización Creada Correctamente',
                'tipo_grupo' => $grupoNuevo->tipo,
                'cantidad_integrantes' => $grupoNuevo->cantidad_integrantes,
                'imagen' => $grupoNuevo->imagen
            ];
            echo json_encode($respuesta);
            return;
        }
        $grupo = new Grupo();
        $tipos = TipoGrupo::all();
        $router->render('grupo/index', [
            'tipos' => $tipos,
            'grupo' => $grupo,
            'titulo' => 'Organizaciones'

        ]);
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
    public static function eliminarGrupo()
    {
        $id = $_POST['id'];
        $grupo = Grupo::find($id);
        $cant = $grupo->getCantidadIntegrantes();
        if ($cant > 0) {
            $respuesta = [
                'tipo' => false,
                'mensaje' => 'La Organizacion Cuenta con Integrantes'
            ];
            echo json_encode($respuesta);
            return;
        }
        $grupo->borrarImagen();
        $grupo->eliminar();
        $respuesta = [
            'tipo' => true,
            'mensaje' => 'Organización Eliminada Correctamente',
        ];
        echo json_encode($respuesta);
    }
    public static function integrante(Router $router)
    {
        $idgrupo = validarORedireccionar('/grupos');
        $dni = validarORedireccionarDNI('/grupos');

        $query = "SELECT * FROM vista_estudiantes WHERE dni = " . $dni . " AND " . "idgrupo_universitario = " . $idgrupo;
        $integrante = Integrante::SQL_primer($query);

        if (is_null($integrante) || $integrante->estado == 'inactivo') {
            header('Location: /grupos');
        }
        $grupo = Grupo::find($idgrupo);
        $invitaciones = Invitacion::where_all('grupo_universitario_id', $idgrupo);
        $participaciones = ParticipacionAlumno::where_all('alumno_x_grupo_id', $integrante->idAlumnoGrupo);
        $beneficios = Beneficio_x_tipo_grupo::validarEstado($grupo->tipo_grupo_id, 'ACTIVO'); //derecjos'tipo_grupo_id', )
        $beneficioAsignados = Beneficio_x_alumno::where_all('alumno_x_grupo_id',  $integrante->idAlumnoGrupo);

        //rendimiento academico
        $rendimientos = Rendimiento_academico::where_all('alumno_id', $integrante->idAlumno);
        $semestres = Semestre::all();

        //desercion 
        $desercionA = desercion_alumno::where_all('alumno_id', $integrante->idAlumno);
        $desercion = Desercion::all();
        $router->render('grupo/integrante', [
            'integrante' => $integrante,
            'grupo' => $grupo,
            'invitaciones' => $invitaciones,
            'participaciones' => $participaciones,
            'beneficios' => $beneficios,
            'beneficioAsignados' => $beneficioAsignados,
            'rendimientos' => $rendimientos,
            'semestres' => $semestres,
            'desercionA' =>  $desercionA,
            'desercion' => $desercion
        ]);
    }



    public static function setAsistencia()
    {
        isAuth();
        $resultado = [];
        $idInvitacion = $_POST['invitacion_id'];
        $participacionAlumno = new ParticipacionAlumno($_POST);
        if ($participacionAlumno->existe()) {
            $respuesta = [
                'tipo' => false,
                'mensaje' => 'El Integrante ya participó en el evento'
            ];
        } else {
            $participacionAlumno->usuario_id = $_SESSION['id'];
            $idsemestre = Semestre::getIdSemestreActual($idInvitacion);

            if (is_null($idsemestre)) {
                $participacionAlumno->semestre_id = '1';
            } else {
                $participacionAlumno->semestre_id = $idsemestre;
            }
            $resultado = $participacionAlumno->crear();
            $respuesta = [
                'tipo' => true,
                'id' => $resultado['id'],
                'mensaje' => 'Asistencia Asignada'
            ];
        }

        echo json_encode($respuesta);
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

    public static function deleteAsistencia()
    {
        $id = $_POST['id'];
        $participacion = ParticipacionAlumno::find($id);
        $resultado = $participacion->eliminar();
        echo json_encode($resultado);
    }


    public static function setBeneficio()
    {
        //$resultado = [];
        $beneficioAlumno = new Beneficio_x_alumno($_POST);
        // if ($beneficioAlumno->existe()) {
        //     $resultado['resultado'] = false;
        // } else {
        $id = $beneficioAlumno->getSemestre();
        $beneficioAlumno->semestre_id = $id;
        $beneficioAlumno->usuario_id = $_SESSION['id'];
        $resultado = $beneficioAlumno->guardar();
        $ben = Beneficio_x_alumno::find($resultado['id']);
        $resultado['fecha'] = $ben->fecha_efectiva;
        // }

        echo json_encode($resultado);
    }

    public static function getBeneficio()
    {
        $idAlumnoGrupo = $_POST['idAlumnoGrupo'];
        $beneficiosAlumnos = Beneficio_x_alumno::where_all('alumno_x_grupo_id', $idAlumnoGrupo);
        $beneficioAlumno = end($beneficiosAlumnos);
        $beneficioAlumno->getNombreBeneficio();
        echo json_encode($beneficioAlumno);
    }


    public static function updBeneficioEst()
    {
        $id = $_POST['id'];
        $bena = Beneficio_x_alumno::find($id);
        $bena->actEstado();
        $resultado = $bena->guardar();
        echo json_encode($bena);
    }


    public static function crearIntegrante()
    {
        $alumno = new Integrante($_POST);
        $resultado =   $alumno->asignarGrupoS();

        echo json_encode($resultado->valor);
    }

    /**
     * !no usado desde la version 2022 pero pasar semestres a la vista
     * */
    public static function rendimiento(Router $router)
    {
        $id = validarORedireccionar('/grupos');
        $alumno = Integrante::where('idAlumno', $id);

        if ($alumno) {
            $rendimientos = Rendimiento_academico::where_all('alumno_id', $alumno->idAlumno);
            // debuguear($rendimientos);
        } else {
            echo 'no existe el alumno';
        }
        $semestres = Semestre::all();
        $router->render('grupo/rendimiento', [
            'rendimientos' => $rendimientos,
            'alumno' => $alumno,
            'semestres' => $semestres
        ]);
    }


    public static function setRendimiento()
    {
        $resultado['existe'] = false;
        $rend = new Rendimiento_academico($_POST);
        if (!$rend->existeSemestre()) {
            if ($rend->id == '') {
                $resultado = $rend->crear();
                $resultado = $resultado['resultado'];
            } else {
                $resultado = $rend->actualizar();
            }
        } else {
            $resultado['existe'] = true;
        }

        echo json_encode($resultado);
    }

    public static function delRendimiento()
    {
        // $id = $_POST['id'];
        $rend = new Rendimiento_academico($_POST);
        $resultado = $rend->eliminar();
        echo json_encode($resultado);
    }

    public static function eliminarIntegrante()
    {

        $id = $_POST['id'];
        $al = new AlumnoGrupo($_POST);
        $participacion = ParticipacionAlumno::where('alumno_x_grupo_id', $id);
        $beneficioAsignados = Beneficio_x_alumno::where('alumno_x_grupo_id', $id);
        if (isset($participacion) || isset($beneficioAsignados)) {
            $res = false;
        } else {
            $res = true;
            $al->eliminar();
        }
        echo json_encode($res);
    }
    // no usado funcion ya optimizada
    public static function desercionALumno(Router $router)
    {
        $id = validarORedireccionar('/grupos');
        $alumno = Integrante::where('idAlumno', $id);

        if ($alumno) {
            $desercionA = desercion_alumno::where_all('alumno_id', $alumno->idAlumno);
            // debuguear($rendimientos);
        } else {
            echo 'no existe el alumno';
        }
        $semestres = Semestre::all();
        $desercion = Desercion::all();
        $router->render('grupo/desercionAlumno', [
            'desercionA' => $desercionA,
            'alumno' => $alumno,
            'semestres' => $semestres,
            'desercion' => $desercion
        ]);
    }

    public static function setDesercionAlumno()
    {
        $id = $_POST['id'];
        $desercion_alumno = new desercion_alumno($_POST);

        if ($desercion_alumno->validarRepeticion() == 'existe') {
            $resultado = false;
        } else {
            if ($id === '') {
                $resultado = $desercion_alumno->crear();
                $resultado =  $resultado['resultado'];
            } else {
                $resultado = $desercion_alumno->actualizar();
            }
        }
        echo json_encode($resultado);
    }

    public static function desercion_alumno_eliminar()
    {
        $id = $_POST['id'];
        $desercion = desercion_alumno::find($id);
        $resultado =  $desercion->eliminar();
        echo json_encode($resultado);
    }


    // * -----------API'S GRUPO---------------- */
    public static function getGrupos()
    {
        $gruposTot = [];
        $grupos = Grupo::all();
        foreach ($grupos as $grupo) {
            $grupo->getCantidadIntegrantes();
            $grupo->getTipoGrupo();
            $gruposTot[] = $grupo;
        }

        echo json_encode(['grupos' => $gruposTot]);
        // echo json_encode($gruposTot);
    }
    public static function eliminarBeneficio()
    {
        $id = $_POST['id'];
        $beneficio = Beneficio_x_alumno::find($id);
        $resultado = $beneficio->eliminar();
        echo json_encode($resultado);
    }

    public static function getParticipaciones()
    {
        // $idgrupo = validarORedireccionar('/grupos');
        // $dni = validarORedireccionarDNI('/grupos');
        $idAlumnoGrupo = $_GET['id'];
        $idAlumno = AlumnoGrupo::find($idAlumnoGrupo)->alumno_id;
        $idgrupo = $_GET['idGrupo'];
        $grupo = Grupo::find($idgrupo);
        $invitaciones = Invitacion::where_all('grupo_universitario_id', $idgrupo);
        $benaTot = [];
        $beneficios = Beneficio_x_tipo_grupo::validarEstado($grupo->tipo_grupo_id, 'ACTIVO'); //derecjos'tipo_grupo_id', )
        $benTot = [];
        $beneficioAsignados = Beneficio_x_alumno::where_all('alumno_x_grupo_id',  $idAlumnoGrupo);
        $participaciones = ParticipacionAlumno::where_all('alumno_x_grupo_id', $idAlumnoGrupo);
        $partTot = [];

        //** Rendimiento */
        $rendimientos = Rendimiento_academico::where_all('alumno_id', $idAlumno);
        $desercionA = desercion_alumno::where_all('alumno_id', $idAlumno);
        // debuguear($rendimientos);


        $semestres = Semestre::all();
        $desercion = Desercion::all();
        foreach ($participaciones as $participacion) {
            $participacion->setEvento();
            $partTot[] = $participacion;
        }

        foreach ($invitaciones as $invitacion) {
            $invitacion->getEvento();
            $invitacion->getEstado();
            $invTot[] = $invitacion;
        }

        foreach ($beneficios as $beneficio) {
            $beneficio->getNombreBeneficio();
            $benTot[] = $beneficio;
        }

        foreach ($beneficioAsignados as $bena) {
            $bena->getNombreBeneficio();
            $benaTot[] = $bena;
        }

        $datos['participaciones'] = $partTot;
        $datos['invitaciones'] = $invTot;
        $datos['beneficios'] = $benTot;
        $datos['beneficiosAsignados'] = $benaTot;
        $datos['rendimientos'] = $rendimientos;
        echo json_encode($datos);
    }
}
