<?php
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('add', 'Home::add');
$routes->post('addData', 'Home::addData');
// $routes->get('edit/(:num)', 'Home::edit/$1');
// $routes->post('getData', 'Home::getData');
// $routes->post('update/(:num)', 'Home::update/$1');
// $routes->post('delete/(:num)', 'Home::delete/$1');


