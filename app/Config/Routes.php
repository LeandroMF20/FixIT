<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

/* -----------------------------------
    Links de acesso a páginas
 ---------------------------------- */
$routes->view('/equipamentos', 'equipamentos_view');

/* -----------------------------------
    Entry-Points da API
 ---------------------------------- */
$routes->post('/equipamentos/add', 'Api\Equipamentos::add');
$routes->get('/equipamentos/get/list', 'Api\Equipamentos::getList'); 
