<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// login
$routes->get('/', 'Home::index');
$routes->get('/cmshome', 'Home::dashboard');
$routes->get('/login', 'User::index');
$routes->post('/aksilogin', 'User::login');
$routes->post('/logout', 'User::logout');
// =============

// profile
$routes->get('/lihat_profile', 'User::lihat_profile');
$routes->get('/ubah_profile', 'User::ubah_profile');
$routes->post('/simpan_profile', 'User::simpan_profile');
$routes->post('/ubah_foto', 'User::ubah_foto');
// =============

// kontak
$routes->get('/cmskontak', 'Home::kontak');
$routes->post('/ubah_kontak', 'Home::ubah_kontak');
// =============

// kategori
$routes->get('/cmskategori', 'Kategori::index');
$routes->post('/tambah_kategori', 'Kategori::tambah_kategori');
$routes->post('/ubah_kategori/(:num)', 'Kategori::ubah_kategori/$1');
$routes->post('/hapus_kategori/(:num)', 'Kategori::hapus_kategori/$1');
$routes->get('/cari_kategori', 'Kategori::cari_kategori');
// =============

//subkategori
$routes->get('/cmssubkategori/(:num)', 'Kategori::index_subkategori/$1');
$routes->post('/tambah_subkategori', 'Kategori::tambah_subkategori');
$routes->post('/ubah_subkategori/(:num)', 'Kategori::ubah_subkategori/$1');
$routes->post('/hapus_subkategori/(:num)', 'Kategori::hapus_subkategori/$1');
$routes->get('/cari_subkategori', 'Kategori::cari_subkategori');
// =============

//artikel
$routes->post('/artikel/getArtikelData', 'artikel::getArtikelData');
$routes->get('/cmsartikel', 'Artikel::index');
$routes->get('/tambah_artikel', 'Artikel::tambah_artikel');
$routes->post('/aksi_tambah_artikel', 'Artikel::aksi_tambah_artikel');
$routes->get('/detail_artikel/(:num)', 'Artikel::detail_artikel/$1');
$routes->post('/hapus_artikel/(:num)', 'Artikel::hapus_artikel/$1');
$routes->post('/ubah_artikel/(:num)', 'Artikel::ubah_artikel/$1');
// =============

//tiket
$routes->post('/tiket/getTiketData', 'Tiket::getTiketData');
$routes->get('/cmstiket', 'Tiket::index');
$routes->get('/detail_tiket/(:num)', 'Tiket::detail_tiket/$1');
// =============

//tentang kami
$routes->get('/cmstentang_kami', 'TentangKami::tentang_kami');
$routes->post('/tambahtentangkami', 'TentangKami::tambahtentangkami');
$routes->post('/ubahtentangkami', 'TentangKami::ubahtentangkami');
$routes->post('/ubahbannerinformasi', 'TentangKami::ubahheadtentangkami');
$routes->post('/hapustentangkami', 'TentangKami::hapustentangkami');
// =============

//riwayat
$routes->post('/riwayat/getRiwayatData', 'Home::getRiwayatData');
$routes->get('/cmshistori', 'Home::histori');
// =============