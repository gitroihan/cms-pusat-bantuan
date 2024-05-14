<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'User::index');
$routes->post('/aksilogin', 'User::login');
$routes->post('/logout', 'User::logout');

$routes->get('/lihat_profile', 'User::lihat_profile');
$routes->get('/ubah_profile', 'User::ubah_profile');
$routes->post('/simpan_profile', 'User::simpan_profile');
$routes->post('/ubah_foto', 'User::ubah_foto');
$routes->get('/cmshistori', 'Home::histori');


$routes->get('/cmshome', 'Home::dashboard');
$routes->get('/cmskontak', 'Home::kontak');

$routes->get('/cmskategori', 'Kategori::index');
$routes->post('/tambah_kategori', 'Kategori::tambah_kategori');
$routes->get('/cmskategori2', 'Kategori::kategori2');

$routes->get('/cmsartikel', 'Artikel::index');
$routes->get('/tambah_artikel', 'Artikel::tambah_artikel');
$routes->get('/detail_artikel', 'Artikel::detail_artikel');


$routes->get('/cmstiket', 'Tiket::index');
$routes->get('/detail_tiket', 'Tiket::detail_tiket');
