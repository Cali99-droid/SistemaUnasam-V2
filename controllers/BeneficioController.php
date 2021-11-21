<?php

namespace Controllers;

use Model\Beneficio;
use Model\Beneficio_x_tipo_grupo;
use Model\Resolucion_x_beneficio;
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

    public static function crear()
    {

        if ($_POST['cod'] == 2) {
            //actualizando
            $beneficio = new Beneficio($_POST['beneficio']);
            $beneficio->guardar();
            $resolucion = new Resolucion_x_beneficio($_POST['resolucion_x_beneficio']);
            $resolucion->beneficio_id = $beneficio->id;
            if ($resolucion->id == '') {
                $resultado = $resolucion->crear();
            } else {
                $resultado = $resolucion->guardar();
            }
        } else {
            //creando
            $beneficio = new Beneficio($_POST['beneficio']);
            $res = $beneficio->crear();
            $id = $res['id'];
            $resolucion = new Resolucion_x_beneficio($_POST['resolucion_x_beneficio']);
            $resolucion->beneficio_id = $id;
            $resu = $resolucion->crear();
            $resultado = $res['resultado'];
        }



        echo json_encode($resultado);
    }


    public static function asignarBeneficio()
    {
        $beneficioAsignado = new Beneficio_x_tipo_grupo($_POST);
        $resultado = $beneficioAsignado->guardar();
        echo json_encode($resultado);
    }

    public static function getBeneficio()
    {
        $id = $_POST['id'];
        $beneficio = Beneficio::find($id);
        $resultado = $beneficio->getResolucion()->fetch_assoc();
        echo  json_encode($resultado);
    }
}
