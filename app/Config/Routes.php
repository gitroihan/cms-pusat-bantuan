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
$routes->post('/ubah_kategori/(:num)', 'Kategori::ubah_kategori/$1');
$routes->post('/hapus_kategori/(:num)', 'Kategori::hapus_kategori/$1');
$routes->get('/cari_kategori', 'Kategori::cari_kategori');

$routes->get('/cmssubkategori/(:num)', 'Kategori::index_subkategori/$1');
$routes->post('/tambah_subkategori', 'Kategori::tambah_subkategori');
$routes->post('/ubah_subkategori/(:num)', 'Kategori::ubah_subkategori/$1');
$routes->post('/hapus_subkategori/(:num)', 'Kategori::hapus_subkategori/$1');
$routes->get('/cari_subkategori', 'Kategori::cari_subkategori');



// $routes->delete('/hapus_kategori/(:num)', 'Kategori::hapus_kategori/$1');


$routes->get('/cmsartikel', 'Artikel::index');
$routes->get('/tambah_artikel', 'Artikel::tambah_artikel');
$routes->get('/detail_artikel', 'Artikel::detail_artikel');


$routes->get('/cmstiket', 'Tiket::index');
$routes->get('/detail_tiket', 'Tiket::detail_tiket');
