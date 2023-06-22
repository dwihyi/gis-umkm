<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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
$routes->get('/', 'User::index');
$routes->get('/user/store', 'User::store');

$routes->group('', ['filter' => 'login'], function($routes){
$routes->get('/admin/index', 'Admin::index');
});

$routes->group('', ['filter' => 'login'], function($routes){
$routes->get('/usaha', 'Usaha::index');
});

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter'=> 'role:admin']);
$routes->get('/admin/kontak', 'Admin::kontak', ['filter' => 'role:admin']);
$routes->delete('/admin/deleteKontak/(:num)', 'Admin::deleteKontak/$1', ['filter' => 'role:admin']);

$routes->get('/kecamatan', 'Kecamatan::index', ['filter' => 'role:admin']);
$routes->get('/kecamatan/index', 'Kecamatan::index', ['filter'=> 'role:admin']);
$routes->get('/kecamatan/add', 'Kecamatan::add', ['filter'=> 'role:admin']);
$routes->get('/kecamatan/add/store', 'Kecamatan::store', ['filter'=> 'role:admin']);
$routes->get('/kecamatan/edit/(:segment)', 'Kecamatan::edit/$1', ['filter'=> 'role:admin']);
$routes->get('/kecamatan/delete/(:segment)', 'Kecamatan::delete/$1', ['filter'=> 'role:admin']);

$routes->get('/sektor', 'Sektor::index', ['filter' => 'role:admin']);
$routes->get('/sektor/index', 'Sektor::index', ['filter'=> 'role:admin']);
$routes->get('/sektor/add', 'Sektor::add', ['filter'=> 'role:admin']);
$routes->get('/sektor/add/store', 'Sektor::store', ['filter'=> 'role:admin']);
$routes->get('/sektor/edit/(:segment)', 'Sektor::edit/$1', ['filter'=> 'role:admin']);
$routes->get('/sektor/delete/(:segment)', 'Sektor::delete/$1', ['filter'=> 'role:admin']);
$routes->get('/sektor/add/store', 'Sektor::store', ['filter'=> 'role:admin']);
$routes->get('/sektor/edit/(:segment)', 'Sektor::edit/$1', ['filter'=> 'role:admin']);
$routes->get('/sektor/delete/(:segment)', 'Sektor::delete/$1', ['filter'=> 'role:admin']);
$routes->get('/sektor/import', 'Sektor::import', ['filter'=> 'role:admin']);

$routes->get('/umkm', 'Umkm::index', ['filter' => 'role:admin']);
$routes->get('/umkm/index', 'Umkm::index', ['filter'=> 'role:admin']);
$routes->get('/umkm/add', 'Umkm::add', ['filter'=> 'role:admin']);
$routes->get('/umkm/add/store', 'Umkm::store', ['filter'=> 'role:admin']);
$routes->get('/umkm/edit/(:segment)', 'Umkm::edit/$1', ['filter'=> 'role:admin']);
$routes->get('/umkm/delete/(:segment)', 'Umkm::delete/$1', ['filter'=> 'role:admin']);
$routes->get('/umkm/import', 'Umkm::import', ['filter'=> 'role:admin']);
$routes->get('/umkm/export', 'Umkm::export', ['filter'=> 'role:admin']);

$routes->get('/admin/kluster', 'Klustering::index', ['filter' => 'role:admin']);

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
