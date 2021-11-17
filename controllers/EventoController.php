<?php

namespace Controllers;

use Model\Evento;
use MVC\Router;

class EventoController
{
    public static function index(Router $router)
    {
        $eventos = Evento::all();
        $router->render('evento/index', ['eventos' => $eventos]);
    }
}
