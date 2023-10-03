<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Homes::index');
$routes->get('/main', 'Homes::index');

$routes->get('/include/login', 'Homes::login');
$routes->post('/include/login', 'Homes::login');

$routes->get('/forgot-password', 'Homes::forgotPassword');
$routes->post('/forgot-password', 'Homes::forgotPassword'); 
$routes->get('/forgot-password', 'Homes::forgotPassword');

$routes->post('/resetpassword', 'Homes::resetPassword');


$routes->get('Homes/getProductsByCategory/(:num)', 'Homes::getProductsByCategory/$1');
$routes->get('/admin', 'AdminController::index',['filter'=>'authGuard']); 

$routes->get('/login', 'AdminController::login');
$routes->get('/logout', 'AdminController::logout'); 

$routes->post('/signin', 'AdminController::LoginAuth');
$routes->get('/Inventory', 'AdminController::Inventory',['filter'=>'authGuard']);  
$routes->get('/view', 'AdminController::product',['filter'=>'authGuard']); 
$routes->get('/admin/product', 'AdminController::product',['filter'=>'authGuard']);


$routes->post('AdminController/updateProduct/(:num)', 'AdminController::updateProduct/$1');



$routes->get('/sidebar', 'AdminController::index');

$routes->get('AdminController/deleteProduct/(:num)', 'AdminController::deleteProduct/$1');

$routes->match(['get', 'post'], '/signup', 'AdminController::register');
$routes->get('/ProductAdd', 'AdminController::addProduct');
$routes->post('/ProductAdd1', 'AdminController::addProduct');







