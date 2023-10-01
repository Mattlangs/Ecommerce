<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/main', 'Homes::index');
$routes->get('/include/login', 'Homes::login');
$routes->post('/include/login', 'Homes::login');
$routes->get('/signup', 'Homes::signup');
$routes->post('/signup', 'Homes::signup'); 
$routes->get('/forgot-password', 'Homes::forgotPassword');
$routes->post('/forgot-password', 'Homes::forgotPassword'); 
$routes->get('/forgot-password', 'Homes::forgotPassword');
$routes->post('/resetpassword', 'Homes::resetPassword');
$routes->get('/main', 'Homes::productList');
$routes->get('Homes/getProductsByCategory/(:num)', 'Homes::getProductsByCategory/$1');
$routes->get('/adminlog', 'AdminController::login');
$routes->post('/adminlog', 'AdminController::login');
$routes->post('/admin', 'AdminController::index');




