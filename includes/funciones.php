<?php

use Model\Opcion_x_tipo;
use Model\DatosUser;
use Model\Opciones;

define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');
function debuguear($variable): string
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

function validarORedireccionar(string $url)
{
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: ${url}");
    }
    return $id;
}

function validarORedireccionarDNI(string $url)
{
    $dni = $_GET['dni'];
    $dni = filter_var($dni, FILTER_VALIDATE_INT);

    if (!$dni) {
        header("Location: ${url}");
    }
    return $dni;
}


function isAuth(): void
{
    if (!isset($_SESSION['login'])) {
        header('Location: /');
    }
}


function mostrarNotificacion($codigo)
{
    $mensaje = '';
    switch ($codigo) {
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}
function validarPermisos($permisoIngresado)
{
    session_start();
    //$idTipo = DatosUser::getTipoUsuario($_SESSION['id'])->fetch_object();
    $id = $_SESSION['id'];
    $user = DatosUser::where('idUsuario', $id);
    $resultado = Opcion_x_tipo::getPermisos2($user->idTipoUsu)->fetch_all();
    $bandera = true;
    //var_dump (($resultado['0']));
    foreach ($resultado as $permiso) {

        if ($permiso[0] == $permisoIngresado) {
            $bandera = false;
        }
    }
    return $bandera;
}
// function validarPermisos($permisoIngresado)
// {
//     // $idTipo = DatosUser::getTipoUsuario($_SESSION['id'])->fetch_object();
//     $id = $_SESSION['id'];
//     $user = DatosUser::where('idUsuario', $id);

//     $resultado = Opcion_x_tipo::getPermisos2($user->idTipoUsu)->fetch_all();
//     $opcion = Opciones::where('nombre', $permisoIngresado);
//     $bandera = false;
//     //var_dump (($resultado['0']));
//     if ($permisoIngresado == 'inicio') {
//         $bandera = true;
//     } else {
//         foreach ($resultado as $permiso) {

//             if ($permiso[0] == $opcion->id) {
//                 $bandera = true;
//             }
//         }
//     }

//     return $bandera;
// }
