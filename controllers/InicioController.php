<?php

namespace Controllers;

use Model\Dash;
use Model\Grupo;
use MVC\Router;


class InicioController
{

    public static function index(Router $router)
    {

        $participantes = Dash::getCantidadParticipantes();
        $invitaciones = Dash::getCantidadInvitaciones();
        $top = Dash::getTop();
        $particionesFecha = Dash::getParticipacionesPorFecha();
        $estadoBeneficios = Dash::getEstadoBeneficios();
        $beneficiosPendientes = Dash::getBeneficiosPendientes();
        $router->render(
            'inicio/index',
            [
                'participantes' => $participantes,
                'invitaciones' => $invitaciones,
                'top' => $top,
                'particionesFecha' => $particionesFecha,
                'estadoBeneficios' => $estadoBeneficios,
                'beneficiosPendientes' => $beneficiosPendientes

            ]
        );
    }
}
