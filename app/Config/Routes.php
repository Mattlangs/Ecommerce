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
$routes->get('/product', 'AdminController::product');
$routes->post('/product', 'AdminController::product'); 
$routes->get('/AdminController/addproduct', 'AdminController::addProduct');
$routes->post('/AdminController/addproduct', 'AdminController::addProduct'); 
$routes->get('/AdminController/editproduct', 'AdminController::editProduct');
$routes->post('/AdminController/editproduct', 'AdminController::editProduct'); 
$routes->get('/AdminController/deleteproduct', 'AdminController::deleteProduct');
$routes->post('/AdminController/deleteproduct', 'AdminController::deleteProduct'); 





