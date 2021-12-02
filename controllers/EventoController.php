<?php

namespace Controllers;

use finfo;
use Model\Evento;
use Model\Organizador;
use Model\Grupo;
use Model\Invitacion;
use MVC\Router;

class EventoController
{
    public static function index(Router $router)
    {

        validarPermisos(4,2);

        $grupos = Grupo::all();
        $eventos = Evento::all();
        $router->render('evento/index', ['eventos' => $eventos, 'grupos' => $grupos]);
    }

    public static function v_crear(Router $router)
    {
        $evento = new Evento();
        $organizadores = Organizador::all();
        $router->render('evento/nuevo-evento', [
            'organizadores' => $organizadores,
            'evento' => $evento
        ]);
    }

    public static function crear()
    {
        $evento = new Evento($_POST);
        if ($_POST['id'] === '') {
            $resultado = $evento->crear();
            $resultado = $resultado['resultado'];
        } else {
            $resultado = $evento->guardar();
        }

        echo json_encode($resultado);
    }

    public static function v_actualizar(Router $router)
    {
        $id = validarORedireccionar($_GET['id']);
        $evento =  Evento::find($id);
        $organizadores = Organizador::all();
        $router->render('evento/actualizar-evento', [
            'organizadores' => $organizadores,
            'evento' => $evento
        ]);
    }

    public static function crearOrg()
    {
        $org = new Organizador($_POST);
        $resultado = $org->guardar();
        echo json_encode($resultado);
    }


    public static function invitar()
    {
        $invitacion = new Invitacion($_POST);
        $resultado = $invitacion->guardar();
        echo  json_encode($resultado);
    }
}
