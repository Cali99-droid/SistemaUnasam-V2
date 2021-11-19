<?php

namespace Controllers;

use Model\Beneficio;
use Model\Beneficio_x_tipo_grupo;
use Model\TipoGrupo;
use MVC\Router;

class BeneficioController
{
    public static function index(Router $router)
    {
        $beneficios = Beneficio::all();
        $tipos = TipoGrupo::all();
        $router->render('beneficio/index', [
            'beneficios' => $beneficios,
            'tipos' => $tipos
        ]);
    }


    public static function asignarBeneficio()
    {
        $beneficioAsignado = new Beneficio_x_tipo_grupo($_POST);
        $resultado = $beneficioAsignado->guardar();
        echo json_encode($resultado);
    }
}
