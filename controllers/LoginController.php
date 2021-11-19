<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class LoginController
{
    public static function login(Router $router)
    {
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();
            if (empty($alertas)) {
                $usuario = Usuario::where('usuario', $auth->usuario);
                if ($usuario) {
                    if ($usuario->comprobarPassword($auth->pass)) {
                        session_start();
                        $_SESSION['username'] = $usuario->usuario;
                        $_SESSION['login'] = true;
                        header('Location: /inicio');
                    } else {
                    }
                } else {
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                }
            }

            $alertas = Usuario::getAlertas();
        }

        $router->renderLog('auth/login', ['alertas' => $alertas]);
    }

    public static function logout(Router $router)
    {
        $alertas = [];
        $_SESSION = [];
        header('Location: /');
    }
}
