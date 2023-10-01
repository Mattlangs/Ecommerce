<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/main', 'Home::index');
$routes->get('/include/login', 'Home::login');
$routes->post('/include/login', 'Home::login');
$routes->get('/signup', 'Home::signup');
$routes->post('/signup', 'Home::signup'); 
$routes->get('/forgot-password', 'Home::forgotPassword');
$routes->post('/forgot-password', 'Home::forgotPassword'); 
$routes->get('/forgot-password', 'Home::forgotPassword');
$routes->post('/resetpassword', 'Home::resetPassword');
$routes->get('/main', 'Home::productList');
$routes->get('home/getProductsByCategory/(:num)', 'Home::getProductsByCategory/$1');
$routes->get('/adminlog', 'AdminController::login');
$routes->post('/adminlog', 'AdminController::login');
$routes->post('/admin', 'AdminController::index');




