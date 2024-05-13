<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'User::index');
$routes->post('/aksilogin', 'User::login'); 
$routes->post('/logout', 'User::logout');


$routes->get('/cmshome', 'Home::dashboard');
$routes->get('/cmsmenu', 'Home::menu');
$routes->get('/cmshistori', 'Home::histori');
$routes->get('/cmskontak', 'Home::kontak');
$routes->get('/cmsuser', 'Home::user');
$routes->get('/edituser', 'Home::edituser');

$routes->get('/cmskategori', 'Kategori::index');
$routes->get('/cmskategori2', 'Kategori::kategori2');

$routes->get('/cmsartikel', 'Artikel::index');
$routes->get('/tambah_artikel', 'Artikel::tambah_artikel');
$routes->get('/detail_artikel', 'Artikel::detail_artikel');


$routes->get('/cmstiket', 'Tiket::index');
$routes->get('/detail_tiket', 'Tiket::detail_tiket');
