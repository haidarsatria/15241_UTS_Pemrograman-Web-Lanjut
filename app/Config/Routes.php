<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'DashboardController::index'); // Halaman login

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->post('logout', 'AuthController::logout');

$routes->get('/admin', 'DashboardController::adminDashboard', ['filter' => 'auth']);
$routes->get('/user', 'DashboardController::userDashboard', ['filter' => 'auth']);
$routes->get('/home', 'DashboardController::produk', ['filter' => 'auth']); // Menampilkan daftar produk
$routes->get('/users', 'DashboardController::users', ['filter' => 'auth']);        // Menampilkan daftar user
$routes->get('/users/create', 'DashboardController::create', ['filter' => 'auth']); // Menampilkan form tambah user
$routes->post('/users/store', 'DashboardController::store');                        // Menyimpan user baru
$routes->get('/users/edit/(:any)', 'DashboardController::edit/$1');                 // Edit user berdasarkan username
$routes->post('/users/update/(:any)', 'DashboardController::update/$1');            // Update user berdasarkan username
$routes->get('/users/delete/(:any)', 'DashboardController::delete/$1');

$routes->group('produk', ['filter' => 'auth'], function ($routes) { 
    $routes->get('', 'ProdukController::index');
    $routes->post('', 'ProdukController::create');
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
    $routes->get('download','ProdukController::download');
});

$routes->group('keranjang', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'TransaksiController::index');
    $routes->post('', 'TransaksiController::cart_add');
    $routes->post('edit', 'TransaksiController::cart_edit');
    $routes->get('delete/(:any)', 'TransaksiController::cart_delete/$1');
    $routes->get('clear', 'TransaksiController::cart_clear');
});

$routes->get('checkout', 'TransaksiController::checkout', ['filter' => 'auth']);
$routes->get('get-location', 'TransaksiController::getLocation', ['filter' => 'auth']);
$routes->get('get-cost', 'TransaksiController::getCost', ['filter' => 'auth']);
$routes->post('buy', 'TransaksiController::buy', ['filter' => 'auth']);