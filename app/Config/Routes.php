<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/', 'Dashboard::index');

$routes->group('admin', function($routes) {
    $routes->get('news', 'News::index');
    $routes->get('news/add', 'News::add');
    $routes->post('news/store', 'News::store');
    $routes->get('news/edit/(:segment)', 'News::edit/$1');
    $routes->post('news/update/(:segment)', 'News::update/$1');
    $routes->delete('news/delete/(:segment)', 'News::delete/$1');
    //web config
    $routes->get('webconfig', 'WebConfig::index');
    $routes->get('webconfig/edit/(:segment)', 'WebConfig::edit/$1');
    $routes->post('webconfig/update/(:segment)', 'WebConfig::update/$1');
    // customer
    $routes->get('customers', 'Customer::index');
    $routes->get('customer/add', 'Customer::add');
    $routes->post('customer/store', 'Customer::store');
    $routes->get('customer/edit/(:segment)', 'Customer::edit/$1');
    $routes->post('customer/update/(:segment)', 'Customer::update/$1');
    $routes->delete('customer/delete/(:segment)', 'Customer::delete/$1');
    //products
    $routes->get('products', 'Product::index');
    $routes->get('product/add', 'Product::add');
    $routes->post('product/store', 'Product::store');
    $routes->get('product/edit/(:segment)', 'Product::edit/$1');
    $routes->post('product/update/(:segment)', 'Product::update/$1');
    $routes->delete('product/delete/(:segment)', 'Product::delete/$1');
    // product category
    $routes->get('product/category', 'ProductCategory::index');
    $routes->get('product/category/add', 'ProductCategory::add');
    $routes->post('product/category/store', 'ProductCategory::store');
    $routes->get('product/category/edit/(:segment)', 'ProductCategory::edit/$1');
    $routes->post('product/category/update/(:segment)', 'ProductCategory::update/$1');
    $routes->delete('product/category/delete/(:segment)', 'ProductCategory::delete/$1');
    // driver
    $routes->get('drivers', 'Driver::index');
});
//$routes->get('news', 'News::index');

//
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
