<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }


    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas()
    {

        // Proteger Rutas...
        session_start();

        // Arreglo de rutas protegidas...
        $rutas_protegidas = ['/inicio', '/perfil', '/grupos', '/grupo', '/integrante/getParticipaciones',         '/integrante', '/integrante/setAsistencia', '/integrante/deleteAsistencia', '/integrante/setBeneficio',   '/integrante/getBeneficio', '/integrante/updBeneficioEst', '/api/getIntegrante', '/api/setTntegrante',    '/beneficios', '/beneficios/getBeneficio', '/beneficios', '/beneficios/asignar', '/beneficios/crear',     '/eventos', '/eventos', '/nuevo-evento', '/actualizar-evento', '/crear-evento', '/crear-org', '/eventos/invitar-grupo', '/reporte', '/tipos', '/usuarios', 'admin/usuarios', '/roles', '/crear-rol', '/get-rol',  '/crear-user', '/get-user', '/semestres', '/api/tipos', '/api/alumno', '/api/crearAlumno'];

        $auth = $_SESSION['login'] ?? null;

        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        // if (validarPermisos(substr($_SERVER['PATH_INFO'], 1))) {
        //     // if (in_array($currentUrl, $rutas_protegidas) && !$auth) {
        //     //     header('Location: /');
        //     // }
        // } else {
        //     header('Location: /inicio');
        // }



        if ($fn) {
            // Call user fn va a llamar una función cuando no sabemos cual sera
            call_user_func($fn, $this); // This es para pasar argumentos
        } else {
            echo "Página No Encontrada o Ruta no válida";
        }
    }

    public function render($view, $datos = [])
    {

        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }

        ob_start(); // Almacenamiento en memoria durante un momento...

        // entonces incluimos la vista en el layout
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el Buffer
        include_once __DIR__ . '/views/layout.php';
    }

    public function renderLog($view, $datos = [])
    {

        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }

        ob_start(); // Almacenamiento en memoria durante un momento...

        // entonces incluimos la vista en el layout
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el Buffer
        include_once __DIR__ . '/views/log.php';
    }
}
