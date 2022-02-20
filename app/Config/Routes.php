<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/login', 'Auth\LoginController::index');
$routes->post('/login', 'Auth\LoginController::auth');
$routes->get('/register', 'Auth\RegisterController::index');
$routes->post('/register', 'Auth\RegisterController::register');
$routes->post('/logout', 'Auth\LogoutController::logout');

$routes->group('dashboard', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'DashboardController::index');

    $routes->presenter('master_fakultas', [
        'websafe' => true,
        'controller' => 'MasterFakultasController',
        'except' => ['show'],
    ]);
    $routes->presenter('master_prodi', [
        'websafe' => true,
        'controller' => 'MasterProdiController',
        'except' => ['show'],
    ]);
    $routes->presenter('master_dosen', [
        'websafe' => true,
        'controller' => 'MasterDosenController',
        'except' => ['show'],
    ]);
    $routes->get('master_mahasiswa/get_prodi/(:num)', 'MasterMahasiswaController::getProdi/$1');
    $routes->presenter('master_mahasiswa', [
        'websafe' => true,
        'controller' => 'MasterMahasiswaController',
        'except' => ['show'],
    ]);

    $routes->post('pendaftaran/approve/(:num)', 'PendaftaranController::approve/$1');
    $routes->post('pendaftaran/disapprove/(:num)', 'PendaftaranController::disapprove/$1');
    $routes->presenter('pendaftaran', [
        'websafe' => true,
        'controller' => 'PendaftaranController',
        'except' => ['show'],
    ]);

    $routes->presenter('sidang', [
        'websafe' => true,
        'controller' => 'SidangController',
        'except' => ['show'],
    ]);

    $routes->get('laporan', 'LaporanController::index');
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
