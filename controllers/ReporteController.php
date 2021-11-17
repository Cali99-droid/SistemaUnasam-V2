<?php

namespace Controllers;

use MVC\Router;

class ReporteController
{
    public static function index(Router $router)
    {
        $router->render('reporte/index', []);
    }
}
