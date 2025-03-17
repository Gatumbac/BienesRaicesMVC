<?php
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;
use Controllers\BlogController;
use Controllers\BloggerController;

$router = new Router();

//Zona privada
$router->get('/admin', [PropiedadController::class, 'index']);
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

$router->get('/admin-blog', [BlogController::class, 'index']);
$router->get('/blogs/crear', [BlogController::class, 'crear']);
$router->post('/blogs/crear', [BlogController::class, 'crear']);
$router->get('/blogs/actualizar', [BlogController::class, 'actualizar']);
$router->post('/blogs/actualizar', [BlogController::class, 'actualizar']);
$router->post('/blogs/eliminar', [BlogController::class, 'eliminar']);

$router->get('/bloggers/crear', [BloggerController::class, 'crear']);
$router->post('/bloggers/crear', [BloggerController::class, 'crear']);
$router->get('/bloggers/actualizar', [BloggerController::class, 'actualizar']);
$router->post('/bloggers/actualizar', [BloggerController::class, 'actualizar']);
$router->post('/bloggers/eliminar', [BloggerController::class, 'eliminar']);

//Zona Publica
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/propiedades', [PaginasController::class, 'propiedades']);
$router->get('/propiedad', [PaginasController::class, 'propiedad']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

$router->comprobarRutas();