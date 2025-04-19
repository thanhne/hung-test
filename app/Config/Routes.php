<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/testDB', 'TestDB::index');

// Customer Routes
$routes->get('/customersList', 'CustomerController::index');
$routes->get('/addcustomer', 'CustomerController::createindex');
$routes->get('/editcustomer/(:num)', 'CustomerController::editindex/$1');
$routes->get('/customer/delete/(:num)', 'CustomerController::delete/$1');
$routes->post('/customer/add', 'CustomerController::create');
$routes->post('/customer/edit/(:num)', 'CustomerController::edit/$1');

$routes->group('api/customers', ['namespace' => 'App\Controllers\API'], function ($routes) {
    $routes->get('/', 'CustomerAPIController::getAllCustomers');
    $routes->get('(:num)', 'CustomerAPIController::getCustomerById/$1');
    $routes->post('/', 'CustomerAPIController::createCustomer');
    $routes->put('(:num)', 'CustomerAPIController::updateCustomer/$1');
    $routes->delete('(:num)', 'CustomerAPIController::deleteCustomer/$1');
});

// Category Routes
$routes->get('/categoriesList', 'CategoryController::index');
$routes->get('/addcategory', 'CategoryController::createindex');
$routes->get('/editcategory/(:num)', 'CategoryController::editindex/$1');
$routes->get('/category/delete/(:num)', 'CategoryController::delete/$1');
$routes->post('/category/add', 'CategoryController::create');
$routes->post('/category/edit/(:num)', 'CategoryController::edit/$1');

$routes->group('api/categories', ['namespace' => 'App\Controllers\API'], function ($routes) {
    $routes->get('/', 'CategoryAPIController::getAllCategories');
    $routes->get('(:num)', 'CategoryAPIController::getCategoryById/$1');
    $routes->post('/', 'CategoryAPIController::createCategory');
    $routes->put('(:num)', 'CategoryAPIController::updateCategory/$1');
    $routes->delete('(:num)', 'CategoryAPIController::deleteCategory/$1');
});


// Product Routes
$routes->get('/productsList', 'ProductController::index');
$routes->get('/addproduct', 'ProductController::createindex');
$routes->get('/editproduct/(:num)', 'ProductController::editindex/$1');
$routes->get('/product/delete/(:num)', 'ProductController::delete/$1');
$routes->post('/product/add', 'ProductController::create');
$routes->post('/product/edit/(:num)', 'ProductController::edit/$1');

$routes->group('api/products', ['namespace' => 'App\Controllers\API'], function ($routes) {
    $routes->get('/', 'ProductAPIController::getAllProducts');
    $routes->get('(:num)', 'ProductAPIController::getProductById/$1');
    $routes->post('/', 'ProductAPIController::createProduct');
    $routes->put('(:num)', 'ProductAPIController::updateProduct/$1');
    $routes->delete('(:num)', 'ProductAPIController::deleteProduct/$1');
});

// Order Routes
$routes->get('/ordersList', 'OrderController::index');
$routes->get('/addorder', 'OrderController::createindex');
$routes->get('/editorder/(:num)', 'OrderController::editindex/$1');
$routes->get('/order/delete/(:num)', 'OrderController::delete/$1');
$routes->post('/order/add', 'OrderController::create');
$routes->post('/order/edit/(:num)', 'OrderController::edit/$1');

$routes->group('api/orders', ['namespace' => 'App\Controllers\API'], function ($routes) {
    $routes->get('/', 'OrderAPIController::getAllOrders');
    $routes->get('(:num)', 'OrderAPIController::getOrderById/$1');
    $routes->post('/', 'OrderAPIController::createOrder');
    $routes->put('(:num)', 'OrderAPIController::updateOrder/$1');
    $routes->delete('(:num)', 'OrderAPIController::deleteOrder/$1');
});
