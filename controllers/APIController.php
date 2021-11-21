<?php

namespace Controllers;

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
}
