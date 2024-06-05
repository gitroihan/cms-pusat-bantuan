<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// login
$routes->get('/', 'Home::index');
$routes->get('/login', 'User::index');
$routes->post('/aksilogin', 'User::login');
$routes->get('/cmshome', 'Home::dashboard', ['filter' => 'auth']);
$routes->post('/logout', 'User::logout');
// =============

// profile
$routes->get('/lihat_profile', 'User::lihat_profile', ['filter' => 'auth']);
$routes->get('/ubah_profile', 'User::ubah_profile', ['filter' => 'auth']);
$routes->post('/simpan_profile', 'User::simpan_profile');
$routes->post('/ubah_foto', 'User::ubah_foto');
$routes->post('/ubahpassword', 'User::editpassword');
// =============

// kategori
$routes->get('/cmskategori', 'Kategori::index', ['filter' => 'auth']);
$routes->post('/tambah_kategori', 'Kategori::tambah_kategori');
$routes->post('/ubah_kategori/(:num)', 'Kategori::ubah_kategori/$1');
$routes->post('/hapus_kategori/(:num)', 'Kategori::hapus_kategori/$1');
$routes->get('/cari_kategori', 'Kategori::cari_kategori', ['filter' => 'auth']);
// =============

//subkategori
$routes->get('/cmssubkategori/(:num)', 'Kategori::index_subkategori/$1', ['filter' => 'auth']);
$routes->post('/tambah_subkategori', 'Kategori::tambah_subkategori');
$routes->post('/ubah_subkategori/(:num)', 'Kategori::ubah_subkategori/$1');
$routes->post('/hapus_subkategori/(:num)', 'Kategori::hapus_subkategori/$1');
$routes->get('/cari_subkategori', 'Kategori::cari_subkategori', ['filter' => 'auth']);
// =============

//artikel
$routes->post('/artikel/getArtikelData', 'artikel::getArtikelData');
$routes->get('/cmsartikel', 'Artikel::index', ['filter' => 'auth']);
$routes->get('/tambah_artikel', 'Artikel::tambah_artikel', ['filter' => 'auth']);
$routes->post('/aksi_tambah_artikel', 'Artikel::aksi_tambah_artikel');
$routes->post('/aksi_tambah_artikel_publish', 'Artikel::aksi_tambah_artikel_publish');
$routes->get('/detail_artikel/(:num)', 'Artikel::detail_artikel/$1', ['filter' => 'auth']);
$routes->post('/hapus_artikel/(:num)', 'Artikel::hapus_artikel/$1');
$routes->post('/ubah_artikel/(:num)', 'Artikel::ubah_artikel/$1');
$routes->post('/ubah_artikel_publish/(:num)', 'Artikel::ubah_artikel_publish/$1');
// =============

//tiket
$routes->post('/tiket/getTiketData', 'Tiket::getTiketData');
$routes->get('/cmstiket', 'Tiket::index', ['filter' => 'auth']);
$routes->get('/detail_tiket/(:num)', 'Tiket::detail_tiket/$1');
// =============

// kontak
$routes->get('/cmskontak', 'Home::kontak', ['filter' => 'auth']);
$routes->get('/cmsubah_kontak', 'Home::cmsubah_kontak', ['filter' => 'auth']);
$routes->post('/ubah_kontak', 'Home::ubah_kontak');
// =============

//tentang kami
$routes->get('/cmstentang_kami', 'TentangKami::tentang_kami', ['filter' => 'auth']);
$routes->post('/tambahtentangkami', 'TentangKami::tambahtentangkami');
$routes->post('/ubahtentangkami', 'TentangKami::ubahtentangkami');
$routes->post('/ubahbannerinformasi', 'TentangKami::ubahheadtentangkami');
$routes->post('/hapustentangkami', 'TentangKami::hapustentangkami');
// =============

//banner
$routes->get('/cmscontent', 'Home::content', ['filter' => 'auth']);
$routes->post('/ubah_content/(:num)', 'Home::ubah_content/$1');
// =============

//privacy policy
$routes->get('/cmsprivacy', 'Home::privacy', ['filter' => 'auth']);
$routes->get('/cmsubah_privacy', 'Home::cmsubah_privacy', ['filter' => 'auth']);
$routes->post('/ubah_privacy', 'Home::ubah_privacy');
// =============

//terms_and_condition
$routes->get('/cmsterms_and_condition', 'Home::terms_and_condition', ['filter' => 'auth']);
$routes->get('/cmsubah_terms_and_condition', 'Home::cmsubah_terms_and_condition', ['filter' => 'auth']);
$routes->post('/ubah_terms_and_condition', 'Home::ubah_terms_and_condition');
// =============

//riwayat
$routes->post('/riwayat/getRiwayatData', 'Home::getRiwayatData');
$routes->get('/cmshistori', 'Home::histori', ['filter' => 'auth']);
// =============