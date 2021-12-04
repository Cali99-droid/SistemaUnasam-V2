<?php

namespace Controllers;

use Model\Dash;
use Model\Usuario;
use Model\Opcion_x_tipo;
use MVC\Router;


class InicioController
{

    public static function index(Router $router)
    {

        isAuth();
        // $id =  $_SESSION['id'];
        // $user = Usuario::find($id);
        // $datos = $user->getDatos();
        // $permisos = Opcion_x_tipo::getPermisos($datos->idTipoUsu);
        $participantes = Dash::getCantidadParticipantes();
        $invitaciones = Dash::getCantidadInvitaciones();
        $top = Dash::getTop();
        $particionesFecha = Dash::getParticipacionesPorFecha();
        $estadoBeneficios = Dash::getEstadoBeneficios();
        $beneficiosPendientes = Dash::getBeneficiosPendientes();
        $escuelas   = Dash::getEscuelas();
        $muestraDash   = Dash::muestraDash();
        $router->render(
            'inicio/index',
            [
                'participantes' => $participantes,
                'invitaciones' => $invitaciones,
                'top' => $top,
                'particionesFecha' => $particionesFecha,
                'estadoBeneficios' => $estadoBeneficios,
                'beneficiosPendientes' => $beneficiosPendientes,
                'escuelas' => $escuelas,
                'muestraDash' => $muestraDash

            ]
        );
    }
}
