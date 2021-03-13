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
$routes->get('/menu/add-to-cart', 'RestaurantMenu::addToCart', ['filter' => 'user_auth']);
$routes->get('/menu/(:num)', 'RestaurantMenu::detail/$1');
$routes->group('auth', function ($routes) {
	$routes->add('login', 'Auth::login');
	$routes->add('register', 'Auth::register');
});
$routes->group('dashboard', function ($routes) {
	$routes->get('/', 'Admin::index', ['filter' => 'admin_auth']);
	$routes->add('menu/new', 'Admin::add');
	$routes->add('menu/edit/(:any)', 'Admin::edit/$1');
});
// $routes->group('admin', function ($routes) {
// 	$routes->add('menu/add', 'Admin::add');
// 	$routes->add('menu/edit', 'Admin::edit');
// });



// $routes->group('admin', function ($routes) {
// 	$routes->get('news', 'NewsAdmin::index');
// 	$routes->get('news/(:segment)/preview', 'NewsAdmin::preview/$1');
// 	$routes->add('news/new', 'NewsAdmin::create');
// 	$routes->add('news/(:segment)/edit', 'NewsAdmin::edit/$1');
// 	$routes->get('news/(:segment)/delete', 'NewsAdmin::delete/$1');
// });

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
