<?php

namespace Controllers;

use Model\DatosUser;
use Model\Opcion_x_tipo;
use Model\Semestre;
use Model\TipoGrupo;
use Model\Usuario;
use Model\Rol;
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
        $users = DatosUser::all();
        $roles = Rol::all();
        $router->render('admin/users/index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public static function semestres(Router $router)
    {
        $semestres = Semestre::all();
        $router->render('admin/semestres/index', ['semestres' => $semestres]);
    }

    public static function roles(Router $router)
    {
        $roles = Rol::all();
        $privilegios = Rol::permisos();
        $router->render('admin/roles/index', ['roles' => $roles, 'privilegios' => $privilegios]);
    }

    public static function getRol()
    {
        $id = $_POST['id'];
        $rol = Rol::find($id);
        $rol->setPermisos();
        echo json_encode($rol);
    }

    public static function crearRol()
    {

        if ($_POST['cod'] == 1) {

            $ids = $_POST['ids'];
            $array = explode(',', $ids);

            $rol = new Rol($_POST);
            $res = $rol->crear();
            $id = $res['id'];
            for ($i = 0; $i < sizeof($array); $i++) {
                $ot = new Opcion_x_tipo();
                $ot->opciones_id = $array[$i];
                $ot->tipo_usuario_id = $id;
                $resultado = $ot->guardar();
            }
        } else {
            $ids = $_POST['ids'];
            $array = explode(',', $ids);

            $rol = new Rol($_POST);
            $id = $rol->id;
            $resul = Opcion_x_tipo::eliminarPriv($id);
            $res = $rol->guardar();

            for ($i = 0; $i < sizeof($array); $i++) {
                $ot = new Opcion_x_tipo();
                $ot->opciones_id = $array[$i];
                $ot->tipo_usuario_id = $id;
                $resultado = $ot->guardar();
            }
        }

        echo  json_encode($resultado);
    }


    public static function crearUser()
    {
        $cod = $_POST['cod'];
        if ($cod == 1) {
            $user = new DatosUser($_POST);
            $resultado =  $user->crearUser()->fetch_object();
        } else {
            $user = new DatosUser($_POST);
            $resultado =  $user->uptUser()->fetch_object();
        }

        echo  json_encode($resultado->valor);
    }


    public static function getUser()
    {
        $dni = $_POST['dni'];
        $user = DatosUser::where('dni', $dni);
        echo json_encode($user);
    }

    public static function setSemestre()
    {
        $id = $_POST['id'];
        $semestre = new Semestre($_POST);
        if ($id) {
            $resultado = $semestre->actualizar();
        } else {
            $resultado = $semestre->crear();
            $resultado =  $resultado['resultado'];
        }

        echo json_encode($resultado);
    }
}
