<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

//Teste inicial
$routes->view('/equipamentos', 'equipamentos_view');
