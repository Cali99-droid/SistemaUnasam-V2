<?php

namespace Controllers;

use Model\Beneficio;
use MVC\Router;

class BeneficioController
{
    public static function index(Router $router)
    {
        $beneficios = Beneficio::all();


        $router->render('beneficio/index', ['beneficios' => $beneficios]);
    }
}
