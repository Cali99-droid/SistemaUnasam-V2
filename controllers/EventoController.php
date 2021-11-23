<?php

namespace Controllers;

use Model\Evento;
use Model\Organizador;
use MVC\Router;

class EventoController
{
    public static function index(Router $router)
    {
        $eventos = Evento::all();
        $router->render('evento/index', ['eventos' => $eventos]);
    }

    public static function v_crear(Router $router)
    {
        $organizadores = Organizador::all();
        $router->render('evento/nuevo-evento', ['organizadores' => $organizadores]);
    }

    public static function crear()
    {
        $evento = new Evento($_POST);
        $resultado = $evento->guardar();
        echo json_encode($resultado);
    }

    public static function crearOrg()
    {
        $org = new Organizador($_POST);
        $resultado = $org->guardar();
        echo json_encode($resultado);
    }
}
