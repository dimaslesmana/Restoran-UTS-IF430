<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/orders', 'Home::orders', ['filter' => 'user_auth']);
$routes->delete('/menu/order/(:num)', 'RestaurantMenu::newOrder/$1', ['filter' => 'user_auth']);
$routes->get('/menu/(:num)', 'RestaurantMenu::detail/$1');

$routes->group('auth', function ($routes) {
	$routes->add('login', 'Auth::login');
	$routes->add('register', 'Auth::register');
	$routes->get('captcha', 'Auth::captcha');
});

$routes->group('dashboard', function ($routes) {
	$routes->get('/', 'Admin::index', ['filter' => 'admin_auth']);
	$routes->add('menu/new', 'Admin::add', ['filter' => 'admin_auth']);
	$routes->add('menu/save', 'Admin::save', ['filter' => 'admin_auth']);
	$routes->add('menu/edit/(:num)', 'Admin::edit/$1', ['filter' => 'admin_auth']);
	$routes->add('menu/update/(:num)', 'Admin::update/$1', ['filter' => 'admin_auth']);
	$routes->delete('menu/delete/(:num)', 'Admin::delete/$1', ['filter' => 'admin_auth']);
});

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
