<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use MVC\Router;
use Controllers\LoginController;
use Controllers\GrupoController;
use Controllers\BeneficioController;
use Controllers\EventoController;
use Controllers\InicioController;
use Controllers\ReporteController;

$router = new Router();

//iniciar session
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

/** Area privada   **/
// Inicio
$router->get('/inicio', [InicioController::class, 'index']);

//Grupos
$router->get('/grupos', [GrupoController::class, 'index']);
$router->post('/grupos', [GrupoController::class, 'index']);

//beneficios
$router->get('/beneficios', [BeneficioController::class, 'index']);
$router->post('/beneficios', [BeneficioController::class, 'index']);

//beneficios
$router->get('/eventos', [EventoController::class, 'index']);
$router->post('/eventos', [EventoController::class, 'index']);

//Reportes
$router->get('/reporte', [ReporteController::class, 'index']);
$router->post('/reporte', [ReporteController::class, 'index']);


//admin
$router->get('/tipos', [AdminController::class, 'tipos']);
$router->get('/usuarios', [AdminController::class, 'users']);
$router->get('/semestres', [AdminController::class, 'semestres']);
$router->post('admin/usuarios', [AdminController::class, 'index']);
// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
