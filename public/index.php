<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\APIController;
use Controllers\citaController;
use Controllers\LoguinController;
use Controllers\ServicioController;
use MVC\Router;

$router = new Router();

//iniciar sesion
$router->get('/', [LoguinController::class, 'loguin']);
$router->post('/', [LoguinController::class, 'loguin']);
$router->get('/logout', [LoguinController::class, 'logout']);

//recuperar passwor
$router->get('/olvide', [LoguinController::class, 'olvide']);
$router->post('/olvide', [LoguinController::class, 'olvide']);
$router->get('/recuperar', [LoguinController::class, 'recuperar']);
$router->post('/recuperar', [LoguinController::class, 'recuperar']);

//crear cuenta
$router->get('/crear-cuenta', [LoguinController::class, 'crear']);
$router->post('/crear-cuenta', [LoguinController::class, 'crear']);

//confirmar cuenta
$router->get('/confirmar-cuenta', [LoguinController::class, 'confirmar']);
$router->get('/mensaje', [LoguinController::class, 'mensaje']);

//area privada
$router->get('/cita', [citaController::class, 'index']);
$router->get('/admin', [AdminController::class, 'index']);

// API cita
$router->get('/api/servicios', [APIController::class, 'index']);
$router->post('/api/citas', [APIController::class, 'guardar']);
$router->post('/api/eliminar', [APIController::class, 'eliminar']);

//crud de servicios
$router->get('/servicios', [ServicioController::class, 'index']);
$router->get('/servicios/crear', [ServicioController::class, 'crear']);
$router->post('/servicios/crear', [ServicioController::class, 'crear']);
$router->get('/servicios/actualizar', [ServicioController::class, 'actualizar']);
$router->post('/servicios/actualizar', [ServicioController::class, 'actualizar']);
$router->post('/servicios/eliminar', [ServicioController::class, 'eliminar']);



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();