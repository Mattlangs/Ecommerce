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
$routes->get('/adminlog', 'AdminController::register');
$routes->post('/adminlog', 'AdminController::register');
$routes->get('/admin', 'AdminController::index');  
$routes->get('/Inventory', 'AdminController::Inventory');  
$routes->get('/view', 'AdminController::product'); 
$routes->get('/admin/product', 'AdminController::product');
$routes->get('/admin/editProduct/(:num)', 'AdminController::editProduct/$1');
$routes->post('/admin/editProduct/(:num)', 'AdminController::editProduct/$1'); 

$routes->get('/admin/deleteProduct/(:num)', 'AdminController::deleteProduct/$1');
$routes->post('/admin/deleteProduct/(:num)', 'AdminController::deleteProduct/$1');

$routes->get('/ProductAdd', 'AdminController::addProduct');
$routes->post('/ProductAdd1', 'AdminController::addProduct');







