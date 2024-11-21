<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/productos', 'ProductoController::index');       // Obtener todos los productos
$routes->post('/productos', 'ProductoController::create');     // Crear un nuevo producto
$routes->get('/productos/(:num)', 'ProductoController::show/$1'); // Leer un producto por ID
$routes->put('/productos/(:num)', 'ProductoController::update/$1'); // Actualizar un producto por ID
$routes->delete('/productos/(:num)', 'ProductoController::delete/$1'); // Eliminar un producto por ID
