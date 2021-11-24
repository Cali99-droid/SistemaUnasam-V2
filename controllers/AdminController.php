<?php

namespace Controllers;

use Model\Semestre;
use Model\TipoGrupo;
use Model\Usuario;
use MVC\Router;

class AdminController
{

    public static function tipos(Router $router)
    {
        $tipos = TipoGrupo::all();
        $router->render('admin/tipos/index', ['tipos' => $tipos]);
    }


    public static function users(Router $router)
    {
        $users = Usuario::all();
        $router->render('admin/users/index', ['users' => $users]);
    }

    public static function semestres(Router $router)
    {
        $semestres = Semestre::all();
        $router->render('admin/semestres/index', ['semestres' => $semestres]);
    }

    public static function roles(Router $router)
    {
        $semestres = Semestre::all();
        $router->render('admin/roles/index', ['semestres' => $semestres]);
    }
}
