<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'DashboardController::index', ['filter' => 'auth']);

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->post('logout', 'AuthController::logout');

$routes->get('/admin', 'DashboardController::adminDashboard', ['filter' => 'auth']);
$routes->get('/user', 'DashboardController::userDashboard', ['filter' => 'auth']);

$routes->get('/users', 'DashboardController::users', ['filter' => 'auth']);        // Menampilkan daftar user
$routes->get('/users/create', 'DashboardController::create', ['filter' => 'auth']); // Menampilkan form tambah user
$routes->post('/users/store', 'DashboardController::store');                        // Menyimpan user baru
$routes->get('/users/edit/(:any)', 'DashboardController::edit/$1');                 // Edit user berdasarkan username
$routes->post('/users/update/(:any)', 'DashboardController::update/$1');            // Update user berdasarkan username
$routes->get('/users/delete/(:any)', 'DashboardController::delete/$1');             // Hapus user berdasarkan username


