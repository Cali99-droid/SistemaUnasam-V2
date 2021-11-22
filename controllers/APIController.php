<?php

namespace Controllers;

use Model\AlumnoGrupo;
use Model\Integrante;
use Model\TipoGrupo;

class APIController
{

    public static function getTipos()
    {
        $tipos = TipoGrupo::all();
        echo json_encode($tipos);
    }

    public static function guardarTipo()
    {
        $tipo = new TipoGrupo($_POST);
        $resultado = $tipo->guardar();
        echo json_encode(['resultado' => $resultado]);
    }


    public static function getAlumno()
    {
        $dni = $_POST['dni'];
        $alumno = Integrante::where('dni', $dni);
        echo json_encode($alumno);
    }

    public static  function setAlumno()
    {

        /*** Primero se debe buscar en la bd local
         *   si no existe se buscar en la API
         *   Si el alumno no existe en la bd local
         *   se deberá crear ese alumno y asignar los nuevos datos de este
         *   en caso exista se deberá solo asignar el dni al grupo
         */

        $dni = $_POST['dni'];
        $idgrupo = $_POST['idgrupo'];
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['estado'];
        $alumno = Integrante::where('dni', $dni);
        $query = 'SELECT * FROM alumno_x_grupo WHERE grupo_universitario_id = ' . $idgrupo . ' AND alumno_id = ' . $alumno->idAlumno;
        $res = AlumnoGrupo::consulta($query);
        $respuesta = $res->fetch_assoc();

        //validar existencia
        if (!is_null($respuesta)) {
            $resultado = false;
        } else {
            //ejecutar proce

            $res = $alumno->asignarGrupo($descripcion, $estado, $idgrupo);
            if ($res) {
                $resultado = true;
            }
        }
        echo json_encode($resultado);
    }
}
