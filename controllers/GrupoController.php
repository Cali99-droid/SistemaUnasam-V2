<?php

namespace Controllers;

use Model\Grupo;
use Model\TipoGrupo;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class GrupoController
{
    public static function index(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $grupo = new Grupo($_POST['grupo']);

            /**Generar nombre unico */
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


            /**Setear imagen */
            if ($_FILES['grupo']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['grupo']['tmp_name']['imagen'])->fit(800, 600);
                $grupo->setImagen($nombreImagen);
            }

            /**Subida de Imagenes */
            //crear carpeta
            if (!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }
            //guarda la imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);
            //guarda en la base de datos
            $resultado = $grupo->crear();
        }

        $grupos = Grupo::all();
        $tipos = TipoGrupo::all();
        $grupo = new Grupo();
        $router->render('grupo/index', ['grupos' => $grupos, 'grupo' => $grupo, 'tipos' => $tipos]);
    }
}
